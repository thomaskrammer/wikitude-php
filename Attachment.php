<?php

	/**
	 * Class that represents an attachment for a Wikitude-Placemark
	 * @author Thomas Krammer - www.powerhour.at
	 *
	 */
	class PowerHour_Wikitude_Attachment 
	{
	
		protected $link = "";
		protected $name = "";
		protected $mimetype = "";
		
		
		/**
		 * Creates an Attachment for a Wikitude-Placemark
		 * @param $link Can be a link to a resource (image, PDF file, ...). You could use this to issue coupons 
		 * or vouchers for potential clients that found you via Wikitude.
		 * @param $name Used to display the name of an attachment link
		 * @param $type Mime type of the attachment. If it is a known type it can automatically trigger an application start 
		 * (e.g. audio/mpeg can start the attachment in the phones media player)
		 */
		public function __construct($link, $name = "", $type = "")
		{
			$this->link = $link;
			$this->name = $name;
			$this->mimetype = $type;
		}
		
		/**
		 * @return Used to display the name of an attachment link
		 */
		public function getName() {
			return $this->name;
		}
	
		/**
		 * @param $name Used to display the name of an attachment link
		 */
		public function setName($name) {
			$this->name = $name;
		}
	
		/**
		 * @return Mime type of the attachment. If it is a known type it can automatically trigger an application start 
		 * (e.g. audio/mpeg can start the attachment in the phones media player)
		 */
		public function getType() {
			return $this->mimetype;
		}
	
		/**
		 * @param $mimetype Mime type of the attachment. If it is a known type it can automatically trigger an application start 
		 * (e.g. audio/mpeg can start the attachment in the phones media player)
		 */
		public function setType($mimetype) {
			$this->mimetype = $mimetype;
		}
	
		
		
		
	}