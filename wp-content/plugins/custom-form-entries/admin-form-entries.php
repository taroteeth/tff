<?php
ob_start();

/*
Plugin Name: Custom Contact Forms
Description: Custom contact forms
Version: 1.0
Author: Devon Riley
*/

global $custom_contact_form_db_version, $table_name, $wpdb;
$custom_contact_form_db_version = '1.0';
$table_name = 'known_custom_form';

function create_custom_tables() {
	global $wpdb, $custom_contact_form_db_version, $table_name;

	$charset = 'utf8mb4';
	$charset_collate = 'utf8mb4_unicode_ci';

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		user_id bigint(20),
		date timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
		name tinytext NOT NULL,
		email mediumtext NOT NULL,
		message text,
		company tinytext,
		PRIMARY KEY (id)
	) CHARACTER SET $charset COLLATE $charset_collate ENGINE=InnoDB;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'custom_contact_form_version', $custom_contact_form_db_version );
}

register_activation_hook( __FILE__, 'create_custom_tables' );


// Process form, add entry to table and send notification email
function contact_form_submit() {

  global $wpdb, $table_name;
  $userID = (get_current_user_id() !== 0) ? get_current_user_id() : null;

  //user posted variables
  $name = $_POST['full_name'];
  $email = $_POST['email'];
  $company = $_POST['company_name'];
  $message = $_POST['message'];

  $data = array(
    'user_id' => $userID,
    'name' => $name,
    'email' => $email,
    'message' => $message,
    'company' => $company
  );

  $format = ['%d', '%s', '%s', '%s', '%s'];

  // Filter Mail
  function set_html_mail_content_type() {
    return 'text/html';
  }
  add_filter( 'wp_mail_content_type', 'set_html_mail_content_type' );

  //php mailer variables
  $to = ['dev@knowncreative.co', 'zarah@knowncreative.co'];
  $subject = 'Contact Form Entry';
  $headers = 'From: '. $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";

  $sent = wp_mail($to, $subject, $message, $headers);

  $wpdb->insert( $table_name, $data, $format );

  if($sent) {
    echo 'success';
  } else {
    echo $message;
  }

  // Reset filter to avoid conflicts
  remove_filter( 'wp_mail_content_type', 'set_html_mail_content_type' );

  exit();
}
add_action('wp_ajax_nopriv_contact_form_submit', 'contact_form_submit');
add_action('wp_ajax_contact_form_submit', 'contact_form_submit');





if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Form_Entries extends WP_List_Table {

	/** Class constructor */
	public function __construct() {

		parent::__construct( [
			'singular' => __( 'Entry', 'sp' ), //singular name of the listed records
			'plural'   => __( 'Entries', 'sp' ), //plural name of the listed records
			'ajax'     => false //should this table support ajax?

		] );

	}

  /**
   * Retrieve customer’s data from the database
   *
   * @param int $per_page
   * @param int $page_number
   *
   * @return mixed
   */
  public static function get_entries( $per_page = 5, $page_number = 1 ) {

    global $wpdb, $table_name;

    $sql = "SELECT * FROM $table_name";

    if ( ! empty( $_REQUEST['orderby'] ) ) {
      $sql .= ' ORDER BY ' . esc_sql( $_REQUEST['orderby'] );
      $sql .= ! empty( $_REQUEST['order'] ) ? ' ' . esc_sql( $_REQUEST['order'] ) : ' ASC';
    }

    $sql .= " LIMIT $per_page";

    $sql .= ' OFFSET ' . ( $page_number - 1 ) * $per_page;

    $result = $wpdb->get_results( $sql, 'ARRAY_A' );

    return $result;
  }

  /**
   * Delete an entry
   *
   * @param int $id entry ID
   */
  public static function delete_entry( $id ) {
    global $wpdb, $table_name;

    $wpdb->delete(
      $table_name,
      [ 'id' => $id ],
      [ '%d' ]
    );
  }

  /**
   * Returns the count of entries
   *
   * @return null|string
   */
  public static function entries_count() {
    global $wpdb, $table_name;

    $sql = "SELECT COUNT(*) FROM $table_name";

    return $wpdb->get_var( $sql );
  }

  /** Text displayed when no entry data is available */
  public function no_items() {
    _e( 'No entries found.', 'sp' );
  }

  /**
   * Method for name column
   *
   * @param array $item an array of DB data
   *
   * @return string
   */
  function column_id( $item ) {

    // create a nonce
    $delete_nonce = wp_create_nonce( 'sp_delete_entry' );

    $title = '<strong>' . $item['id'] . '</strong>';

    $actions = [
      'delete' => sprintf( '<a href="?page=%s&action=%s&entry=%s&_wpnonce=%s">Delete</a>', esc_attr( $_REQUEST['page'] ), 'delete', absint( $item['id'] ), $delete_nonce )
    ];

    return $title . $this->row_actions( $actions );
  }

  /**
   * Render a column when no column specific method exists.
   *
   * @param array $item
   * @param string $column_name
   *
   * @return mixed
   */
  public function column_default( $item, $column_name ) {
    switch ( $column_name ) {
			case 'id':
			case 'date':
      case 'name':
      case 'email':
      case 'message':
      case 'company':
        return $item[ $column_name ];
      default:
        return print_r( $item, true ); //Show the whole array for troubleshooting purposes
    }
  }

  /**
   * Render the bulk edit checkbox
   *
   * @param array $item
   *
   * @return string
   */
  function column_cb( $item ) {
    return sprintf(
      '<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['id']
    );
  }

  /**
   *  Associative array of columns
   *
   * @return array
   */
  function get_columns() {
    $columns = [
      'cb'      => '<input type="checkbox" />',
			'id'			=> __( 'id', 'sp' ),
			'date'		=> __( 'Date', 'sp' ),
      'name'    => __( 'Name', 'sp' ),
      'email' 	=> __( 'Email', 'sp' ),
      'company'	=> __( 'Company', 'sp' ),
      'message'	=> __( 'Message', 'sp' )
    ];

    return $columns;
  }

  /**
   * Columns to make sortable.
   *
   * @return array
   */
  public function get_sortable_columns() {
    $sortable_columns = array(
			'id'			=> array( 'id', false ),
			'date' 		=> array( 'date', false ),
      'name' 		=> array( 'name', false ),
      'email' 	=> array( 'email', false ),
      'company'	=> array( 'company', false )
    );

    return $sortable_columns;
  }

  /**
   * Returns an associative array containing the bulk action
   *
   * @return array
   */
  public function get_bulk_actions() {
    $actions = [
      'bulk-delete' => 'Delete'
    ];

    return $actions;
  }

  /**
   * Handles data query and filter, sorting, and pagination.
   */
  public function prepare_items() {

    $this->_column_headers = $this->get_column_info();

    /** Process bulk action */
    $this->process_bulk_action();

    $per_page     = $this->get_items_per_page( 'entries_per_page', 5 );
    $current_page = $this->get_pagenum();
    $total_items  = self::record_count();

    $this->set_pagination_args( [
      'total_items' => $total_items, //WE have to calculate the total number of items
      'per_page'    => $per_page //WE have to determine how many items to show on a page
    ] );

    $this->items = self::get_entries( $per_page, $current_page );
  }

  public function process_bulk_action() {

    //Detect when a bulk action is being triggered...
    if ( 'delete' === $this->current_action() ) {

      // In our file that handles the request, verify the nonce.
      $nonce = esc_attr( $_REQUEST['_wpnonce'] );

      if ( ! wp_verify_nonce( $nonce, 'sp_delete_entry' ) ) {
        wp_die( 'Go get a life script kiddies' );
      }
      else {
        self::delete_entry( absint( $_GET['entry'] ) );
				wp_redirect( esc_url( add_query_arg() ) );
				exit;
      }

    }

    // If the delete bulk action is triggered
    if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-delete' )
         || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-delete' )
    ) {

      $delete_ids = esc_sql( $_POST['bulk-delete'] );

      // loop over the array of record IDs and delete them
      foreach ( $delete_ids as $id ) {
        self::delete_entry( $id );
      }
      wp_redirect( esc_url( add_query_arg() ) );
      exit;
    }
  }

}


class SP_Plugin {

	// class instance
	static $instance;

	// entry WP_List_Table object
	public $entries_obj;

	// class constructor
	public function __construct() {
		add_filter( 'set-screen-option', [ __CLASS__, 'set_screen' ], 10, 3 );
		add_action( 'admin_menu', [ $this, 'plugin_menu' ] );
		//add_action('admin_enqueue_scripts', [ $this, 'load_js' ]);
		add_action('wp_enqueue_scripts', [ $this, 'load_js' ]);
	}

	public function load_js() {
		wp_enqueue_script( 'custom-contact-form', plugins_url( '/js/custom-contact-form.js', __FILE__ ), $deps, $ver, true);
	}

  public static function set_screen( $status, $option, $value ) {
  	return $value;
  }

  public function plugin_menu() {

    $hook = add_users_page(
			'Contact Form Entries',
			'Contact Form Entries',
			'manage_options',
			'contact-form-entries',
			[ $this, 'plugin_settings_page' ]
		);

    add_action( "load-$hook", [ $this, 'screen_option' ] );

  }

  /**
  * Screen options
  */
  public function screen_option() {

  	$option = 'per_page';
  	$args   = [
  		'label'   => 'Entries',
  		'default' => 5,
  		'option'  => 'entries_per_page'
  	];

  	add_screen_option( $option, $args );

  	$this->entries_obj = new Form_Entries();
  }

  /**
  * Plugin settings page
  */
  public function plugin_settings_page() {
  	?>
  	<div class="wrap">
  		<h2>Contact Form Entries</h2>

  		<div id="poststuff">
  			<div id="post-body" class="metabox-holder columns-2">
  				<div id="post-body-content">
  					<div class="meta-box-sortables ui-sortable">
  						<form method="post">
  							<?php
  							$this->entries_obj->prepare_items();
  							$this->entries_obj->display(); ?>
  						</form>
  					</div>
  				</div>
  			</div>
  			<br class="clear">
  		</div>
  	</div>
  <?php
  }

  /** Singleton instance */
  public static function get_instance() {
  	if ( ! isset( self::$instance ) ) {
  		self::$instance = new self();
  	}

  	return self::$instance;
  }

}

add_action( 'plugins_loaded', function () {
  SP_Plugin::get_instance();
} );
