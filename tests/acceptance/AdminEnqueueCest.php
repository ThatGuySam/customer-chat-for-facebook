<?php
class AdminEnqueueCest {

	function _before(AcceptanceTester $I) {
		// will be executed at the beginning of each test
		$I->loginAsAdmin();
		$I->am('administrator');
	}

	function enqueue_admin_scripts(AcceptanceTester $I) {
		$I->wantTo('access to the plugin settings page and check the scripts enqueue');
		$I->amOnPage('/wp-admin/admin.php?page=customer-chat-for-facebook');
		$I->seeInPageSource('customer-chat-for-facebook-settings-script');
		$I->seeInPageSource('customer-chat-for-facebook-admin-script');
	}

	function enqueue_admin_styles(AcceptanceTester $I) {
		$I->wantTo('access to the plugin settings page and check the style enqueue');
		$I->amOnPage('/wp-admin/admin.php?page=customer-chat-for-facebook');
		$I->seeInPageSource('customer-chat-for-facebook-settings-styles-css');
		$I->seeInPageSource('customer-chat-for-facebook-admin-styles-css');
	}

}
