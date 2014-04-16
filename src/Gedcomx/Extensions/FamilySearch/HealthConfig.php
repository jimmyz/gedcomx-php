<?php
/**
 *
 * 
 *
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.
 *
 */

namespace Gedcomx\Extensions\FamilySearch;

/**
 * 
 */
class HealthConfig 
{
    

    /**
     * (no documentation provided)
     */
    private $buildDate;
    /**
     * (no documentation provided)
     */
    private $buildVersion;
    /**
     * (no documentation provided)
     */
    private $databaseVersion;
    /**
     * (no documentation provided)
     */
    private $platformVersion;

    /**
     * Constructs a HealthConfig from a (parsed) JSON hash
     */
    public function __construct($o = null) {
      if( $o ) {
        $this->initFromArray($o);
      }
    }

    /**
     * (no documentation provided)
     */
    public function getBuildDate() {
      return $this->buildDate;
    }

    /**
     * (no documentation provided)
     */
    public function setBuildDate($buildDate) {
      $this->buildDate = $buildDate;
    }
    /**
     * (no documentation provided)
     */
    public function getBuildVersion() {
      return $this->buildVersion;
    }

    /**
     * (no documentation provided)
     */
    public function setBuildVersion($buildVersion) {
      $this->buildVersion = $buildVersion;
    }
    /**
     * (no documentation provided)
     */
    public function getDatabaseVersion() {
      return $this->databaseVersion;
    }

    /**
     * (no documentation provided)
     */
    public function setDatabaseVersion($databaseVersion) {
      $this->databaseVersion = $databaseVersion;
    }
    /**
     * (no documentation provided)
     */
    public function getPlatformVersion() {
      return $this->platformVersion;
    }

    /**
     * (no documentation provided)
     */
    public function setPlatformVersion($platformVersion) {
      $this->platformVersion = $platformVersion;
    }
    /**
     * Returns the associative array for this HealthConfig
     */
    public function toArray() {
      $a = array();
      if( $this->buildDate ) {
            $a["buildDate"] = $this->buildDate;
      }
      if( $this->buildVersion ) {
            $a["buildVersion"] = $this->buildVersion;
      }
      if( $this->databaseVersion ) {
            $a["databaseVersion"] = $this->databaseVersion;
      }
      if( $this->platformVersion ) {
            $a["platformVersion"] = $this->platformVersion;
      }
      return $a;
    }

    /**
     * Returns the JSON string for this HealthConfig
     */
    public function toJson() {
      return json_encode($this->toArray());
    }

    /**
     * Initializes this HealthConfig from an associative array
     */
    public function initFromArray($o) {
      if( isset($o['buildDate']) ) {
            $this->buildDate = $o["buildDate"];
      }
      if( isset($o['buildVersion']) ) {
            $this->buildVersion = $o["buildVersion"];
      }
      if( isset($o['databaseVersion']) ) {
            $this->databaseVersion = $o["databaseVersion"];
      }
      if( isset($o['platformVersion']) ) {
            $this->platformVersion = $o["platformVersion"];
      }
    }
}