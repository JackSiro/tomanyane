<?php
	
	$database = new As_Dbconn();
		
	$As_Table_Details = array(	
		'articleid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'article_title varchar(200) DEFAULT NULL',
		'article_slag varchar(200) DEFAULT NULL',
		'article_content mediumtext',
		'article_blogcatid tinyint(11) NOT NULL DEFAULT 0',
		'article_tags varchar(200) DEFAULT NULL',
		'article_userid int(10) unsigned DEFAULT 0',
		'article_posted datetime NOT NULL',
		'article_views int(10) unsigned NOT NULL DEFAULT 0',
		'article_state smallint(5) unsigned NOT NULL DEFAULT 0',
		'article_updatebyid int(10) unsigned DEFAULT NULL',
		'article_flagcount tinyint(3) unsigned DEFAULT NULL',
		'article_updated datetime DEFAULT NULL',
		'article_tatu smallint(5) unsigned NOT NULL DEFAULT 0',
		'article_nne smallint(5) unsigned NOT NULL DEFAULT 0',
		'article_tano smallint(5) unsigned NOT NULL DEFAULT 0',
		'PRIMARY KEY (articleid)',
		);
	$add_query = $database->as_table_exists_create( 'as_blog', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'blogcatid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'blogcategory_parentid smallint(10) unsigned NOT NULL DEFAULT 0',
		'blogcategory_title varchar(100) DEFAULT NULL',
		'blogcategory_slag varchar(50) DEFAULT NULL',
		'blogcategory_content mediumtext',
		'blogcategory_userid int(10) unsigned DEFAULT 0',
		'blogcategory_created datetime NOT NULL',
		'blogcategory_state smallint(5) unsigned NOT NULL DEFAULT 0',
		'blogcategory_updatebyid int(10) unsigned DEFAULT NULL',
		'blogcategory_flagcount tinyint(3) unsigned DEFAULT NULL',
		'blogcategory_updated datetime DEFAULT NULL',
		'blogcategory_nne smallint(5) unsigned NOT NULL DEFAULT 0',
		'blogcategory_tano smallint(5) unsigned NOT NULL DEFAULT 0',
		'PRIMARY KEY (blogcatid)',
		);
	$add_query = $database->as_table_exists_create( 'as_blog_cat', $As_Table_Details ); 
		
	$As_Table_Details = array(	
		'blogcommid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'blogcomm_tagline varchar(500) DEFAULT NULL',
		'blogcomm_articleid tinyint(11) NOT NULL DEFAULT 0',
		'blogcomm_userid int(10) unsigned DEFAULT 0',
		'blogcomm_posted datetime NOT NULL',
		'blogcomm_state smallint(5) unsigned NOT NULL DEFAULT 0',
		'blogcomm_updatebyid int(10) unsigned DEFAULT NULL',
		'blogcomm_flagcount tinyint(3) unsigned DEFAULT NULL',
		'blogcomm_updated datetime DEFAULT NULL',
		'blogcomm_tatu smallint(5) unsigned NOT NULL DEFAULT 0',
		'blogcomm_nne smallint(5) unsigned NOT NULL DEFAULT 0',
		'blogcomm_tano smallint(5) unsigned NOT NULL DEFAULT 0',
		'PRIMARY KEY (blogcommid)',		
		);
	$add_query = $database->as_table_exists_create( 'as_blog_comm', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'blogtagid int(11) NOT NULL AUTO_INCREMENT',
		'blogtag_userid int(11) DEFAULT NULL',
		'blogtag_title varchar(50) NOT NULL',
		'blogtag_slug varchar(50) NOT NULL',
		'blogtag_created datetime DEFAULT NULL',
		'PRIMARY KEY (blogtagid)',		
		);
	$add_query = $database->as_table_exists_create( 'as_blog_tag', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'menuid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'menu_slag varchar(50) DEFAULT NULL',
		'menu_title varchar(100) DEFAULT NULL',
		'menu_content varchar(200) DEFAULT NULL',
		'menu_state int(10) unsigned NOT NULL DEFAULT 0',
		'menu_position int(10) unsigned NOT NULL DEFAULT 0',
		'menu_created datetime DEFAULT NULL',
		'menu_createdby int(10) unsigned DEFAULT NULL',
		'menu_updated datetime DEFAULT NULL',
		'menu_updateby int(10) unsigned DEFAULT NULL',
		'menu_tatu smallint(5) unsigned NOT NULL DEFAULT 0',
		'menu_nne smallint(5) unsigned NOT NULL DEFAULT 0',
		'menu_tano smallint(5) unsigned NOT NULL DEFAULT 0',
		'PRIMARY KEY (menuid)',
		);
	$add_query = $database->as_table_exists_create( 'as_menu', $As_Table_Details ); 
	
	// menuitem_menuid, menuitem_parent, menuitem_slag,menuitem_title,menuitem_link,menuitem_content, menuitem_created,menuitem_createdby,menuitem_target
	$As_Table_Details = array(	
		'menuitemid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'menuitem_menuid int(10) unsigned NOT NULL DEFAULT 0',
		'menuitem_parent int(10) unsigned NOT NULL DEFAULT 0',
		'menuitem_slag varchar(50) DEFAULT NULL',
		'menuitem_title varchar(100) DEFAULT NULL',
		'menuitem_link varchar(100) DEFAULT NULL',
		'menuitem_content varchar(200) DEFAULT NULL',
		'menuitem_state int(10) unsigned NOT NULL DEFAULT 0',
		'menuitem_created datetime DEFAULT NULL',
		'menuitem_createdby int(10) unsigned DEFAULT NULL',
		'menuitem_updated datetime DEFAULT NULL',
		'menuitem_updateby int(10) unsigned DEFAULT NULL',
		'menuitem_position int(10) unsigned NOT NULL DEFAULT 0',
		'menuitem_parent_position int(10) unsigned NOT NULL DEFAULT 0',
		'menuitem_target int(10) unsigned NOT NULL DEFAULT 0',
		'menuitem_type varchar(50) DEFAULT NULL',
		'PRIMARY KEY (menuitemid)',
		);
	$add_query = $database->as_table_exists_create( 'as_menu_item', $As_Table_Details );
	
	$As_Table_Details = array(	
		'optionid int(11) NOT NULL AUTO_INCREMENT',
		'option_title varchar(100) NOT NULL',
		'option_content varchar(2000) NOT NULL',
		'option_createdby int(10) unsigned DEFAULT NULL',
		'option_created datetime DEFAULT NULL',
		'option_updatedby int(10) unsigned DEFAULT NULL',
		'option_updated datetime DEFAULT NULL',
		'PRIMARY KEY (optionid)',
		);
	$add_query = $database->as_table_exists_create( 'as_site_options', $As_Table_Details ); 
	
	//pageid,page_homepage,page_title,page_content, page_slug, page_state,page_views
	$As_Table_Details = array(	
		'pageid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'page_homepage int(10) unsigned NOT NULL DEFAULT 0',
		'page_title varchar(200) DEFAULT NULL',
		'page_content varchar(40000) DEFAULT NULL',
		'page_slug varchar(100) DEFAULT NULL',
		'page_state int(10) unsigned NOT NULL DEFAULT 0',
		'page_views int(10) unsigned NOT NULL DEFAULT 0',
		'page_created datetime DEFAULT NULL',
		'page_createdby int(10) unsigned DEFAULT NULL',
		'page_updated datetime DEFAULT NULL',
		'page_updatedby int(10) unsigned DEFAULT NULL',
		'page_tatu smallint(5) unsigned NOT NULL DEFAULT 0',
		'page_nne smallint(5) unsigned NOT NULL DEFAULT 0',
		'page_tano smallint(5) unsigned NOT NULL DEFAULT 0',
		'PRIMARY KEY (pageid)',
		);
	$add_query = $database->as_table_exists_create( 'as_page', $As_Table_Details ); 
		
	$As_Table_Details = array(	
		'proverbid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'proverb_userid int(10) unsigned DEFAULT "0"',
		'proverb_state smallint(5) unsigned NOT NULL DEFAULT "0"',
		'proverb_wordid int(10) unsigned DEFAULT "0"',
		'proverb_title varchar(100) DEFAULT NULL',
		'proverb_slag varchar(100) DEFAULT NULL',
		'proverb_english varchar(100) DEFAULT NULL',
		'proverb_meaning varchar(10000) DEFAULT NULL',
		'proverb_tags varchar(8000) DEFAULT NULL',
		'proverb_place varchar(50) DEFAULT NULL',
		'proverb_intValue int(11) NOT NULL DEFAULT "0"',
		'proverb_posted datetime NOT NULL',
		'proverb_updatebyid int(10) unsigned DEFAULT NULL',
		'proverb_flagcount tinyint(3) unsigned DEFAULT NULL',
		'proverb_updated datetime DEFAULT NULL',
		'proverb_tatu smallint(5) unsigned NOT NULL DEFAULT "0"',
		'proverb_nne smallint(5) unsigned NOT NULL DEFAULT "0"',
		'proverb_tano smallint(5) unsigned NOT NULL DEFAULT "0"',
		'PRIMARY KEY (proverbid)',
		);
	$add_query = $database->as_table_exists_create( 'as_proverb', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'tagengid int(11) NOT NULL AUTO_INCREMENT',
		'tageng_userid int(11) DEFAULT NULL',
		'tageng_title varchar(50) NOT NULL',
		'tageng_slug varchar(50) NOT NULL',
		'tageng_created datetime DEFAULT NULL',
		'PRIMARY KEY (tagengid)',		
		);
	$add_query = $database->as_table_exists_create( 'as_tag_eng', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'tagswaid int(11) NOT NULL AUTO_INCREMENT',
		'tagswa_userid int(11) DEFAULT NULL',
		'tagswa_title varchar(50) NOT NULL',
		'tagswa_slug varchar(50) NOT NULL',
		'tagswa_created datetime DEFAULT NULL',
		'PRIMARY KEY (tagswaid)',		
		);
	$add_query = $database->as_table_exists_create( 'as_tag_swa', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'tribeid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'tribe_title varchar(100) DEFAULT NULL',
		'tribe_slag varchar(50) DEFAULT NULL',
		'tribe_userid int(10) unsigned DEFAULT NULL',
		'tribe_created datetime DEFAULT NULL',
		'tribe_updateby int(10) unsigned DEFAULT NULL',
		'tribe_updated datetime DEFAULT NULL',
		'tribe_content mediumtext',
		'tribe_parent int(11) DEFAULT "0"',
		'tribe_tatu smallint(5) unsigned NOT NULL DEFAULT "0"',
		'tribe_nne smallint(5) unsigned NOT NULL DEFAULT "0"',
		'tribe_tano smallint(5) unsigned NOT NULL DEFAULT "0"',
		'PRIMARY KEY (tribeid)',
		);
	$add_query = $database->as_table_exists_create( 'as_tribe', $As_Table_Details );
	
	//$userid, $user_name, $user_fname, $user_sname, $user_sex, $user_password, $user_mobile, $user_email, $user_group, $user_level, $user_tribe, $user_avatar, $user_joined, $user_lastseen, $user_updated
	$As_Table_Details = array(	
		'userid int(11) NOT NULL AUTO_INCREMENT',
		'user_name varchar(50) NOT NULL',
		'user_fname varchar(50) NOT NULL',
		'user_sname varchar(50) NOT NULL',
		'user_sex int(10) NOT NULL DEFAULT 1',
		'user_password text NOT NULL',
		'user_mobile varchar(50) NOT NULL',
		'user_email varchar(200) NOT NULL',
		'user_group int(10) NOT NULL DEFAULT 0',
		'user_level int(10) NOT NULL DEFAULT 0',
		'user_tribe int(10) NOT NULL DEFAULT 0',
		'user_avatar varchar(50) NOT NULL DEFAULT "user_default.jpg"',
		'user_joined datetime DEFAULT NULL',
		'user_lastseen datetime DEFAULT NULL',
		'user_updated datetime DEFAULT NULL',
		'user_field3 varchar(100) NOT NULL',
		'user_field4 varchar(100) NOT NULL',
		'user_field5 varchar(100) NOT NULL',
		'PRIMARY KEY (userid)',
		);
	$add_query = $database->as_table_exists_create( 'as_user', $As_Table_Details ); 
		
	$As_Table_Details = array(
		'messageid int(11) NOT NULL AUTO_INCREMENT',
		'message_readerid int(11) DEFAULT NULL',
		'message_title varchar(50) NOT NULL',
		'message_content varchar(10000) NOT NULL',
		'message_senderid int(11) DEFAULT NULL',
		'message_state int(11) DEFAULT NULL',
		'message_senton datetime DEFAULT NULL',
		'message_readon datetime DEFAULT NULL',
		'PRIMARY KEY (messageid)',
		);
	$add_query = $database->as_table_exists_create( 'as_user_message', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'notifyid int(11) NOT NULL AUTO_INCREMENT',
		'notify_generator varchar(50) NOT NULL',
		'notify_type varchar(50) NOT NULL',
		'notify_title varchar(50) NOT NULL',
		'notify_content varchar(10000) NOT NULL',
		'notify_readerid int(11) DEFAULT NULL',
		'notify_nstate int(11) DEFAULT NULL',
		'notify_created datetime DEFAULT NULL',
		'notify_readon datetime DEFAULT NULL',
		'notify_action varchar(50) NOT NULL',
		'notify_link varchar(150) NOT NULL',
		'notify_field2 varchar(50) NOT NULL',
		'notify_field3 varchar(50) NOT NULL',
		'notify_field4 varchar(50) NOT NULL',
		'notify_field5 varchar(50) NOT NULL',
		'notify_field6 varchar(50) NOT NULL',
		'notify_field7 varchar(50) NOT NULL',
		'PRIMARY KEY (notifyid)',		
		);
	$add_query = $database->as_table_exists_create( 'as_user_notification', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'profileid int(11) NOT NULL AUTO_INCREMENT',
		'profile_userid int(11) DEFAULT NULL',
		'profile_title varchar(50) NOT NULL',
		'profile_content varchar(10000) NOT NULL',
		'PRIMARY KEY (profileid)',		
		);
	$add_query = $database->as_table_exists_create( 'as_user_profile', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'widghetid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'widghet_type varchar(100) DEFAULT NULL',
		'widghet_title varchar(100) DEFAULT NULL',
		'widghet_content varchar(2000) DEFAULT NULL',
		'widghet_position int(10) unsigned DEFAULT NULL',
		'widghet_state int(10) unsigned DEFAULT NULL',
		'widghet_location int(10) unsigned DEFAULT NULL',
		'widghet_created datetime DEFAULT NULL',
		'widghet_createdby int(10) unsigned DEFAULT NULL',
		'widghet_updated datetime DEFAULT NULL',
		'widghet_updateby int(10) unsigned DEFAULT NULL',
		'widghet_tatu smallint(5) unsigned NOT NULL DEFAULT 0',
		'widghet_nne smallint(5) unsigned NOT NULL DEFAULT 0',
		'widghet_tano smallint(5) unsigned NOT NULL DEFAULT 0',
		'PRIMARY KEY (widghetid)',
		);
	$add_query = $database->as_table_exists_create( 'as_widghet', $As_Table_Details ); 
	
	//wordid, word_tribe, word_title, word_slag, word_plural, word_meaning, word_tageng, word_tagswa, word_views, word_state, word_flagcount, word_postedby, word_posted, word_updatedby, word_updated
	$As_Table_Details = array(	
		'wordid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'word_tribe tinyint(11) NOT NULL DEFAULT "0"',
		'word_title varchar(100) DEFAULT NULL',
		'word_slag varchar(50) DEFAULT NULL',
		'word_plural varchar(200) DEFAULT NULL',
		'word_meaning varchar(2000) DEFAULT NULL',
		'word_tageng varchar(200) DEFAULT NULL',
		'word_tagswa varchar(200) DEFAULT NULL',
		'word_views int(10) unsigned NOT NULL DEFAULT "0"',
		'word_state smallint(5) unsigned NOT NULL DEFAULT "0"',
		'word_flagcount tinyint(3) unsigned DEFAULT NULL',
		'word_postedby int(10) unsigned DEFAULT "0"',
		'word_posted datetime DEFAULT NULL',
		'word_updateby int(10) unsigned DEFAULT NULL',
		'word_updated datetime DEFAULT NULL',
		'word_moja varchar(200) NOT NULL',
		'word_mbili varchar(200) NOT NULL',
		'word_tatu varchar(200) NOT NULL',
		'word_nne varchar(200) NOT NULL',
		'word_tano varchar(200) NOT NULL',
		'word_sita varchar(200) NOT NULL',
		'word_saba varchar(200) NOT NULL',
		'PRIMARY KEY (wordid)',
		);
	$add_query = $database->as_table_exists_create( 'as_word', $As_Table_Details ); 
	 
	
	$As_Table_Details = array(	
		'xxxwordid int(11) NOT NULL AUTO_INCREMENT',
		'xxxword_userid int(11) DEFAULT NULL',
		'xxxword_title varchar(50) NOT NULL',
		'xxxword_slug varchar(50) NOT NULL',
		'xxxword_created datetime DEFAULT NULL',
		'PRIMARY KEY (xxxwordid)',		
		);
	$add_query = $database->as_table_exists_create( 'as_xxxword', $As_Table_Details ); 
	 
?>