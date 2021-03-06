<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Mage_Core
 * @subpackage  unit_tests
 * @copyright   Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Mage_DesignEditor_Model_Url_FactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Mage_DesignEditor_Model_Url_Factory
     */
    protected $_model;

    /**
     * @var Magento_ObjectManager
     */
    protected $_objectManager;

    public function setUp()
    {
        $this->_objectManager = $this->getMock('Magento_ObjectManager_Zend', array('addAlias', 'create'),
            array(), '', false);
        $this->_model = new Mage_DesignEditor_Model_Url_Factory($this->_objectManager);
    }

    public function testConstruct()
    {
        $this->assertAttributeInstanceOf('Magento_ObjectManager', '_objectManager', $this->_model);
    }

    public function testReplaceClassName()
    {
        $this->_objectManager->expects($this->once())
            ->method('addAlias')
            ->with('Mage_Core_Model_Url', 'TestClass');

        $this->assertEquals($this->_model, $this->_model->replaceClassName('TestClass'));
    }

    public function testCreateFromArray()
    {
        $this->_objectManager->expects($this->once())
            ->method('create')
            ->with('Mage_Core_Model_Url', array(), false)
            ->will($this->returnValue('ModelInstance'));

        $this->assertEquals('ModelInstance', $this->_model->createFromArray());
    }
}
