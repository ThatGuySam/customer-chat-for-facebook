<?php

class InitializeTest extends \Codeception\TestCase\WPTestCase {
	/**
	 * @var string
	 */
	protected $root_dir;

	public function setUp() {
		parent::setUp();

		// your set up methods here
		$this->root_dir = dirname( dirname( dirname( __FILE__ ) ) );

        wp_set_current_user(0);
        wp_logout();
        wp_safe_redirect(wp_login_url());
	}

	public function tearDown() {
		parent::tearDown();
	}

	private function make_instance() {
		return new Ccff_Initialize();
	}

	/**
	 * @test
	 * it should be instantiatable
	 */
	public function it_should_be_instantiatable() {
		$sut = $this->make_instance();
		$this->assertInstanceOf( 'Ccff_Initialize', $sut );
	}

	/**
	 * @test
	 * it should be front
	 */
	public function it_should_be_front() {
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
		$classes[] = 'Ccff_Enqueue';
		$classes[] = 'Ccff_Extras';

		$this->assertEquals( $classes, $sut->classes );
	}

}
