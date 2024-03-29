<?php
/*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2013 PrestaShop SA
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class ContactControllerCore extends FrontController
{
	public $php_self = 'contact';
	public $ssl = true;

	/**
	 * Start forms process
	 * @see FrontController::postProcess()
	 */
	public function postProcess()
	{
		if (Tools::isSubmit('submitMessage'))
                    
		{  
           //die('hhhh');                    $extension = array( '.rtf', '.doc', '.docx', '.pdf', '.zip', '.png', '.jpeg', '.gif', '.jpg');
			$fileAttachment = Tools::fileAttachment('fileUpload');
			$message = Tools::getValue('message'); // Html entities is not usefull, iscleanHtml check there is no bad html tags.
			if (!($from = trim(Tools::getValue('from'))) || !Validate::isEmail($from))
                        
                                $this->errors[] = Tools::displayError('Invalid email address.');
                                                    
                        if (!$message)
				
                            $this->errors[] = Tools::displayError('The message cannot be blank.');
                        
                        
                        if (!Validate::isCleanHtml($message))
			
                            $this->errors[] = Tools::displayError('Invalid message');
                                               
                        if (!($id_contact = (int)(Tools::getValue('id_contact'))) || !(Validate::isLoadedObject($contact = new Contact($id_contact, $this->context->language->id))))
			
                                $this->errors[] = Tools::displayError('Please select a subject from the list provided. ');
                        
                        
                        if (!empty($fileAttachment['name']) && $fileAttachment['error'] != 0)
			
                                $this->errors[] = Tools::displayError('An error occurred during the file-upload process.');
                        
                        
                        if (!empty($fileAttachment['name']) && !in_array( Tools::strtolower(substr($fileAttachment['name'], -4)), $extension) && !in_array( Tools::strtolower(substr($fileAttachment['name'], -5)), $extension))
			
                                $this->errors[] = Tools::displayError('Bad file extension');
                        
                        
                        if (!Tools::getValue('name'))
                                                 $this->errors[] = Tools::displayError ('Name is Left Blank');
                        else
			{
				$customer = $this->context->customer;
				if (!$customer->id)
					$customer->getByEmail($from);

				$contact = new Contact($id_contact, $this->context->language->id);

				if (!((
						($id_customer_thread = (int)Tools::getValue('id_customer_thread'))
						&& (int)Db::getInstance()->getValue('
						SELECT cm.id_customer_thread FROM '._DB_PREFIX_.'customer_thread cm
						WHERE cm.id_customer_thread = '.(int)$id_customer_thread.' AND cm.id_shop = '.(int)$this->context->shop->id.' AND token = \''.pSQL(Tools::getValue('token')).'\'')
					) || (
						$id_customer_thread = CustomerThread::getIdCustomerThreadByEmailAndIdOrder($from, (int)Tools::getValue('id_order'))
					)))
				{
					$fields = Db::getInstance()->executeS('
					SELECT cm.id_customer_thread, cm.id_contact, cm.id_customer, cm.id_order, cm.id_product, cm.email
					FROM '._DB_PREFIX_.'customer_thread cm
					WHERE email = \''.pSQL($from).'\' AND cm.id_shop = '.(int)$this->context->shop->id.' AND ('.
						($customer->id ? 'id_customer = '.(int)($customer->id).' OR ' : '').'
						id_order = '.(int)(Tools::getValue('id_order')).')');
					$score = 0;
					foreach ($fields as $key => $row)
					{
						$tmp = 0;
						if ((int)$row['id_customer'] && $row['id_customer'] != $customer->id && $row['email'] != $from)
							continue;
						if ($row['id_order'] != 0 && Tools::getValue('id_order') != $row['id_order'])
							continue;
						if ($row['email'] == $from)
							$tmp += 4;
						if ($row['id_contact'] == $id_contact)
							$tmp++;
						if (Tools::getValue('id_product') != 0 && $row['id_product'] == Tools::getValue('id_product'))
							$tmp += 2;
						if ($tmp >= 5 && $tmp >= $score)
						{
							$score = $tmp;
							$id_customer_thread = $row['id_customer_thread'];
						}
					}
				}
				$old_message = Db::getInstance()->getValue('
					SELECT cm.message FROM '._DB_PREFIX_.'customer_message cm
					LEFT JOIN '._DB_PREFIX_.'customer_thread cc on (cm.id_customer_thread = cc.id_customer_thread)
					WHERE cc.id_customer_thread = '.(int)($id_customer_thread).' AND cc.id_shop = '.(int)$this->context->shop->id.'
					ORDER BY cm.date_add DESC');
				if ($old_message == $message)
				{
					$this->context->smarty->assign('alreadySent', 1);
					$contact->email = '';
					$contact->customer_service = 0;
				}

				if ($contact->customer_service)
				{
					if ((int)$id_customer_thread)
					{
						$ct = new CustomerThread($id_customer_thread);
						$ct->status = 'open';
						$ct->id_lang = (int)$this->context->language->id;
						$ct->id_contact = (int)($id_contact);
						if ($id_order = (int)Tools::getValue('id_order'))
							$ct->id_order = $id_order;
						if ($id_product = (int)Tools::getValue('id_product'))
							$ct->id_product = $id_product;
						$ct->update();
					}
					else
					{
						$ct = new CustomerThread();
						if (isset($customer->id))
							$ct->id_customer = (int)($customer->id);
						$ct->id_shop = (int)$this->context->shop->id;
						if ($id_order = (int)Tools::getValue('id_order'))
							$ct->id_order = $id_order;
						if ($id_product = (int)Tools::getValue('id_product'))
							$ct->id_product = $id_product;
						$ct->id_contact = (int)($id_contact);
						$ct->id_lang = (int)$this->context->language->id;
						$ct->email = $from;
						$ct->status = 'open';
						$ct->token = Tools::passwdGen(12);
						$ct->add();
					}

					if ($ct->id)
					{
						$cm = new CustomerMessage();
						$cm->id_customer_thread = $ct->id;
						$cm->message = $message;
						if (isset($fileAttachment['rename']) && !empty($fileAttachment['rename']) && rename($fileAttachment['tmp_name'], _PS_MODULE_DIR_.'../upload/'.basename($fileAttachment['rename'])))
							$cm->file_name = $fileAttachment['rename'];
						$cm->ip_address = ip2long($_SERVER['REMOTE_ADDR']);
						$cm->user_agent = $_SERVER['HTTP_USER_AGENT'];
						if (!$cm->add())
							$this->errors[] = Tools::displayError('An error occurred while sending the message.');
					}
					else
						$this->errors[] = Tools::displayError('An error occurred while sending the message.');
				}

				if (!count($this->errors))
				{
					$var_list = array(
									'{order_name}' => '-',
									'{attached_file}' => '-',
									'{message}' => Tools::nl2br(stripslashes($message)),
									'{email}' =>  $from,
									'{product_name}' => '',
								);

					if (isset($fileAttachment['name']))
						$var_list['{attached_file}'] = $fileAttachment['name'];

					$id_order = (int)Tools::getValue('id_order');
					
					$id_product = (int)Tools::getValue('id_product');
					
					if (isset($ct) && Validate::isLoadedObject($ct) && $ct->id_order)
						$id_order = $ct->id_order;

					if ($id_order)
					{
						$order = new Order((int)$id_order);
						$var_list['{order_name}'] = $order->getUniqReference();
						$var_list['{id_order}'] = $id_order;
					}
					
					if ($id_product)
					{
						$product = new Product((int)$id_product);
						if (Validate::isLoadedObject($product) && isset($product->name[Context::getContext()->language->id]))
							$var_list['{product_name}'] = $product->name[Context::getContext()->language->id];
					}

					if (empty($contact->email))
						Mail::Send($this->context->language->id, 'contact_form', ((isset($ct) && Validate::isLoadedObject($ct)) ? sprintf(Mail::l('Your message has been correctly sent #ct%1$s #tc%2$s'), $ct->id, $ct->token) : Mail::l('Your message has been correctly sent')), $var_list, $from, null, null, null, $fileAttachment);
					else
					{					
						if (!Mail::Send($this->context->language->id, 'contact', Mail::l('Message from contact form').' [no_sync]',
							$var_list, $contact->email, $contact->name, $from, ($customer->id ? $customer->firstname.' '.$customer->lastname : ''),
									$fileAttachment) ||
								!Mail::Send($this->context->language->id, 'contact_form', ((isset($ct) && Validate::isLoadedObject($ct)) ? sprintf(Mail::l('Your message has been correctly sent #ct%1$s #tc%2$s'), $ct->id, $ct->token) : Mail::l('Your message has been correctly sent')), $var_list, $from, null, $contact->email, $contact->name, $fileAttachment))
									$this->errors[] = Tools::displayError('An error occurred while sending the message.');
					}
				}
				
				if (count($this->errors) > 1)
					array_unique($this->errors);
				else
					$this->context->smarty->assign('confirmation', 1);
			}
		}
	}

	public function setMedia()
	{
		parent::setMedia();
		$this->addCSS(_THEME_CSS_DIR_.'contact-form.css');
		$this->addJS(_THEME_JS_DIR_.'contact-form.js');
	}

	/**
	 * Assign template vars related to page content
	 * @see FrontController::initContent()
	 */
	public function initContent()
	{
		parent::initContent();

		$this->assignOrderList();

		$email = Tools::safeOutput(Tools::getValue('from',
		((isset($this->context->cookie) && isset($this->context->cookie->email) && Validate::isEmail($this->context->cookie->email)) ? $this->context->cookie->email : '')));
		$this->context->smarty->assign(array(
			'errors' => $this->errors,
			'email' => $email,
			'fileupload' => Configuration::get('PS_CUSTOMER_SERVICE_FILE_UPLOAD')
		));


		if (($id_customer_thread = (int)Tools::getValue('id_customer_thread')) && $token = Tools::getValue('token'))
		{
			$customerThread = Db::getInstance()->getRow('
				SELECT cm.* 
				FROM '._DB_PREFIX_.'customer_thread cm
				WHERE cm.id_customer_thread = '.(int)$id_customer_thread.' 
				AND cm.id_shop = '.(int)$this->context->shop->id.' 
				AND token = \''.pSQL($token).'\'
			');
			$this->context->smarty->assign('customerThread', $customerThread);
		}
		
		$this->context->smarty->assign(array(
			'contacts' => Contact::getContacts($this->context->language->id),
			'message' => html_entity_decode(Tools::getValue('message'))
		));

		$this->setTemplate(_PS_THEME_DIR_.'contact-form.tpl');
	}

	/**
	 * Assign template vars related to order list and product list ordered by the customer
	 */
	protected function assignOrderList()
	{
		if ($this->context->customer->isLogged())
		{
			$this->context->smarty->assign('isLogged', 1);

			$products = array();
			$result = Db::getInstance()->executeS('
			SELECT id_order
			FROM '._DB_PREFIX_.'orders
			WHERE id_customer = '.(int)$this->context->customer->id.' ORDER BY date_add');
			$orders = array();
			foreach ($result as $row)
			{
				$order = new Order($row['id_order']);
				$date = explode(' ', $order->date_add);				
				$tmp = $order->getProducts();
				foreach ($tmp as $key => $val)
					$products[$row['id_order']][$val['product_id']] = array('value' => $val['product_id'], 'label' => $val['product_name']);
				$orders[] = array('value' => $order->id, 'label' => $order->getUniqReference().' - '.Tools::displayDate($date[0],null) , 'selected' => (int)Tools::getValue('id_order') == $order->id);
			}

			$this->context->smarty->assign('orderList', $orders);
			$this->context->smarty->assign('orderedProductList', $products);
		}
	}
}