<?php

	/**
	 * Class that represents an ARML-Document
	 * @author Thomas Krammer - www.powerhour.at
	 *
	 */
	class PowerHour_Wikitude_Arml 
	{
		
		protected $xmlns = 'http://www.opengis.net/kml/2.2';
		protected $ns_ar = 'http://www.openarml.org/arml/1.0';
		protected $ns_wiki = 'http://www.openarml.org/wikitude/1.0';
		
		protected $doc = null;
		
		protected $kml = null;
		
		//
		protected $providerid = "";
		protected $name = "";
		protected $description = "";
		protected $tags = "";
		protected $providerUrl = "";
		protected $logo = "";
		protected $icon = "";
		
		protected $poiList = array();
	
		public function __construct($provider, $name)
		{
			$this->providerid = $provider;
			$this->name = $name;
			$this->doc = new DOMDocument('1.0', 'utf-8');
			$this->kml = $this->doc->createElementNS($this->xmlns,'kml');
			$this->kml = $this->doc->appendChild($this->kml);
			$this->kml->setAttributeNS($this->xmlns,'xmlns:ar', $this->ns_ar);
			$this->kml->setAttributeNS($this->xmlns,'xmlns:wikitude', $this->ns_wiki);
		}
		
		/**
		 * @return the $providerid
		 */
		public function getProviderid() {
			return $this->providerid;
		}
	
			/**
		 * @param $providerid the $providerid to set
		 */
		public function setProviderid($providerid) {
			$this->providerid = $providerid;
		}
	
			/**
		 * @return the $name
		 */
		public function getName() {
			return $this->name;
		}
	
			/**
		 * @param $name the $name to set
		 */
		public function setName($name) {
			$this->name = $name;
		}
	
			/**
		 * @return the $description
		 */
		public function getDescription() {
			return $this->description;
		}
	
			/**
		 * @param $description the $description to set
		 */
		public function setDescription($description) {
			$this->description = $description;
		}
	
			/**
		 * @return the $tags
		 */
		public function getTags() {
			return $this->tags;
		}
	
			/**
		 * @param $tags the $tags to set
		 */
		public function setTags($tags) {
			$this->tags = $tags;
		}
	
			/**
		 * @return the $providerUrl
		 */
		public function getProviderUrl() {
			return $this->providerUrl;
		}
	
			/**
		 * @param $providerUrl the $providerUrl to set
		 */
		public function setProviderUrl($providerUrl) {
			$this->providerUrl = $providerUrl;
		}
	
		/**
		 * @return the $icon
		 */
		public function getLogo() {
			return $this->logo;
		}
	
			/**
		 * @param $icon the $icon to set
		 */
		public function setLogo($logo) {
			$this->logo = $logo;
		}
		
			/**
		 * @return the $icon
		 */
		public function getIcon() {
			return $this->icon;
		}
	
			/**
		 * @param $icon the $icon to set
		 */
		public function setIcon($icon) {
			$this->icon = $icon;
		}

		/**
		 * Adds a Single-POI to the ARML-Document
		 * @param PowerHour_Wikitude_IPOI $poi
		 */
		public function addPOI(PowerHour_Wikitude_IPOI $poi)
		{
			$this->poiList[] = $poi;
		}
		
		/**
		 * Adds a list of POI to the ARML-Document
		 * @param array $poiList Must implement PowerHour_Wikitude_IPOI
		 */
		public function addPOIList(array $poiList)
		{
			foreach($poiList as $poi)
			{
				$this->addPOI($poi);
			}
		}
		
		/**
		 * Translates the content of the class to a valid ARML-String
		 */
		public function __toString()
		{
			$Document = $this->kml->appendChild($this->doc->createElement('Document'));
			
			$provider = $Document->appendChild($this->doc->createElementNS($this->ns_ar, 'ar:provider'));
			
			$provider_id = $this->doc->createAttribute('id');
			$provider->appendChild($provider_id);
			$provider_id->appendChild($this->doc->createTextNode($this->providerid));
			
			$provider->appendChild($this->doc->createElementNS($this->ns_ar, 'ar:name', $this->name));
			$descr = $provider->appendChild($this->doc->createElementNS($this->ns_ar, 'ar:description'));
			$descr->appendChild($this->doc->createCDATASection($this->description));
			$provider->appendChild($this->doc->createElementNS($this->ns_wiki, 'wikitude:providerUrl', $this->providerUrl));
			$provider->appendChild($this->doc->createElementNS($this->ns_wiki, 'wikitude:tags', $this->tags));
			$provider->appendChild($this->doc->createElementNS($this->ns_wiki, 'wikitude:logo', $this->logo));
			$provider->appendChild($this->doc->createElementNS($this->ns_wiki, 'wikitude:icon', $this->icon));
			
			foreach($this->poiList as $poi)
			{
				$placemark = $Document->appendChild($this->doc->createElement('Placemark'));
				$attr_id = $this->doc->createAttribute('id');
				$placemark->appendChild($attr_id);
				$attr_id->appendChild($this->doc->createTextNode($poi->getId()));
				$placemark->appendChild($this->doc->createElementNS($this->ns_ar, 'ar:provider', $this->getProviderid()));
				$placemark->appendChild($this->doc->createElement('name', ($poi->getName())));
				$description = $placemark->appendChild($this->doc->createElement('description'));
				$description->appendChild($this->doc->createCDATASection($poi->getDescription()));
				
				$wikiinfo = $placemark->appendChild($this->doc->createElementNS($this->ns_wiki, 'wikitude:info'));
				if(strlen($poi->getThumbnail()) > 0)
					$wikiinfo->appendChild($this->doc->createElementNS($this->ns_wiki,'wikitude:thumbnail', $poi->getThumbnail()));
				if(strlen($poi->getPhone()) > 0)
					$wikiinfo->appendChild($this->doc->createElementNS($this->ns_wiki,'wikitude:phone', $poi->getPhone()));
				if(strlen($poi->getUrl()) > 0)
					$wikiinfo->appendChild($this->doc->createElementNS($this->ns_wiki,'wikitude:url', $poi->getUrl()));
				if(strlen($poi->getEmail()) > 0)
					$wikiinfo->appendChild($this->doc->createElementNS($this->ns_wiki,'wikitude:email', $poi->getEmail()));
				if(strlen($poi->getAddress()) > 0)
					$wikiinfo->appendChild($this->doc->createElementNS($this->ns_wiki,'wikitude:address', $poi->getAddress()));
				if($poi->getAttachment())
				{
					$attachment = $wikiinfo->appendChild($this->doc->createElementNS($this->ns_wiki,'wikitude:attachment', $poi->getAddress()));
					// Name of Attachment
					$attach_name = $this->doc->createAttribute('name');
					$attachment->appendChild($attach_name);
					$attach_name->appendChild($this->doc->createTextNode($poi->getAttachment()->getName()));
					// Mime-Type of Attachment
					$attach_mime = $this->doc->createAttribute('type');
					$attachment->appendChild($attach_mime);
					$attach_mime->appendChild($this->doc->createTextNode($poi->getAttachment()->getType()));
				}
				
				$Point = $placemark->appendChild($this->doc->createElement('Point'));
				$Point->appendChild($this->doc->createElement('coordinates',$poi->getCoordinates()));
			}
			
			return $this->doc->saveXML();
		}
		
	}