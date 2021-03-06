<?php


/**
 * This class defines the structure of the 'customer' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Thu Oct 31 14:46:46 2013
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class CustomerTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CustomerTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('customer');
		$this->setPhpName('Customer');
		$this->setClassname('Customer');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('COMPANY', 'Company', 'VARCHAR', false, 255, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 255, null);
		$this->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', false, 255, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 255, null);
		$this->addColumn('ADDRESS', 'Address', 'VARCHAR', false, 255, null);
		$this->addColumn('ADDRESS_BIS', 'AddressBis', 'VARCHAR', false, 255, null);
		$this->addColumn('ZIP', 'Zip', 'VARCHAR', false, 255, null);
		$this->addColumn('CITY', 'City', 'VARCHAR', false, 255, null);
		$this->addForeignKey('COUNTRY_ID', 'CountryId', 'INTEGER', 'country', 'ID', true, null, null);
		$this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 255, null);
		$this->addColumn('MOBILE', 'Mobile', 'VARCHAR', false, 255, null);
		$this->addColumn('FAX', 'Fax', 'VARCHAR', false, 255, null);
		$this->addColumn('SIRET', 'Siret', 'VARCHAR', false, 255, null);
		$this->addColumn('APE', 'Ape', 'VARCHAR', false, 255, null);
		$this->addColumn('TVA', 'Tva', 'VARCHAR', false, 255, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', true, null, null);
		$this->addColumn('STATE', 'State', 'INTEGER', true, null, null);
		$this->addColumn('ACTIVATED_AT', 'ActivatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Country', 'Country', RelationMap::MANY_TO_ONE, array('country_id' => 'id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Groupe', 'Groupe', RelationMap::ONE_TO_MANY, array('id' => 'customer_id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Log', 'Log', RelationMap::ONE_TO_MANY, array('id' => 'customer_id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Tag', 'Tag', RelationMap::ONE_TO_MANY, array('id' => 'customer_id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Unit', 'Unit', RelationMap::ONE_TO_MANY, array('id' => 'customer_id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('User', 'User', RelationMap::ONE_TO_MANY, array('id' => 'customer_id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('CustomerHasModule', 'CustomerHasModule', RelationMap::ONE_TO_MANY, array('id' => 'customer_id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Disk', 'Disk', RelationMap::ONE_TO_MANY, array('id' => 'customer_id', ), 'SET NULL', 'SET NULL');
    $this->addRelation('UsageSupport', 'UsageSupport', RelationMap::ONE_TO_MANY, array('id' => 'customer_id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Thesaurus', 'Thesaurus', RelationMap::ONE_TO_MANY, array('id' => 'customer_id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Preset', 'Preset', RelationMap::ONE_TO_MANY, array('id' => 'customer_id', ), 'CASCADE', 'CASCADE');
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', ),
		);
	} // getBehaviors()

} // CustomerTableMap
