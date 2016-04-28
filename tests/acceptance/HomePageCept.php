<?php
$I = new AcceptanceTester();
$I->wantTo('see home page');
$I->amOnPage('/');
$I->see('Funcraft auth');