CREATE TABLE tx_mytestextension_domain_model_mymainmodel (
	title varchar(255) NOT NULL DEFAULT '',
	description text,
	sub_models int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_mytestextension_domain_model_mysubmodel (
	mymainmodel int(11) unsigned DEFAULT '0' NOT NULL,
	title varchar(255) NOT NULL DEFAULT '',
	description text
);
