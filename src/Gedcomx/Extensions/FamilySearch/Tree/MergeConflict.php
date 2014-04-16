<?php
/**
 *
 * 
 *
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.
 *
 */

namespace Gedcomx\Extensions\FamilySearch\Tree;

/**
 * 
 */
class MergeConflict 
{
    

    /**
     * (no documentation provided)
     */
    private $survivorResource;
    /**
     * (no documentation provided)
     */
    private $duplicateResource;

    /**
     * Constructs a MergeConflict from a (parsed) JSON hash
     */
    public function __construct($o = null) {
      if( $o ) {
        $this->initFromArray($o);
      }
    }

    /**
     * (no documentation provided)
     */
    public function getSurvivorResource() {
      return $this->survivorResource;
    }

    /**
     * (no documentation provided)
     */
    public function setSurvivorResource($survivorResource) {
      $this->survivorResource = $survivorResource;
    }
    /**
     * (no documentation provided)
     */
    public function getDuplicateResource() {
      return $this->duplicateResource;
    }

    /**
     * (no documentation provided)
     */
    public function setDuplicateResource($duplicateResource) {
      $this->duplicateResource = $duplicateResource;
    }
    /**
     * Returns the associative array for this MergeConflict
     */
    public function toArray() {
      $a = array();
      if( $this->survivorResource ) {
            $a["survivorResource"] = $this->survivorResource->toArray();
      }
      if( $this->duplicateResource ) {
            $a["duplicateResource"] = $this->duplicateResource->toArray();
      }
      return $a;
    }

    /**
     * Returns the JSON string for this MergeConflict
     */
    public function toJson() {
      return json_encode($this->toArray());
    }

    /**
     * Initializes this MergeConflict from an associative array
     */
    public function initFromArray($o) {
      if( isset($o['survivorResource']) ) {
            $this->survivorResource = new \Gedcomx\Common\ResourceReference($o["survivorResource"]);
      }
      if( isset($o['duplicateResource']) ) {
            $this->duplicateResource = new \Gedcomx\Common\ResourceReference($o["duplicateResource"]);
      }
    }
}