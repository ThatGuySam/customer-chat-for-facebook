<?php

class InitializeAdminTest extends \Codeception\TestCase\WPTestCase {
	/**
	 * @var string
	 */
	protected $root_dir;

	public function setUp() {
		parent::setUp();

		// your set up methods here
		$this->root_dir = dirname( dirname( dirname( __FILE__ ) ) );

        $user_id = $this->factory->user->create( array( 'role' => 'administrator' ) );
		$user = wp_set_current_user( $user_id );
		set_current_screen( 'edit.php' );
	}

	public function tearDown() {
		parent::tearDown();
	}

	private function make_instance() {
		return new Ccff_Initialize();
	}

	/**
	 * @test
	 * it should be admin
	 */
	public function it_should_be_admin() {
		$sut = $this->make_instance();

		$classes   = array();
		$classes[] = 'Ccff_PostTypes';
		$classes[] = 'Ccff_CMB';
		$classes[] = 'Ccff_Cron';
		$classes[] = 'Ccff_FakePage';
		$classes[] = 'Ccff_Template';
		$classes[] = 'Ccff_Widgets';
		$classes[] = 'Ccff_Rest';
		$classes[] = 'Ccff_Transient';
 		$classes[] = 'Ccff_Ajax';
 		$classes[] = 'Ccff_Ajax_Admin';
		$classes[] = 'Ccff_Pointers';
		$classes[] = 'Ccff_ContextualHelp';
		$classes[] = 'Ccff_Admin_ActDeact';
		$classes[] = 'Ccff_Admin_Notices';
		$classes[] = 'Ccff_Admin_Settings_Page';
		$classes[] = 'Ccff_Admin_Enqueue';
		$classes[] = 'Ccff_Admin_ImpExp';
		$classes[] = 'Ccff_Enqueue';
		$classes[] = 'Ccff_Extras';

		$this->assertTrue( is_admin() );
		$this->assertEquals( $classes, $sut->classes );
	}

}
