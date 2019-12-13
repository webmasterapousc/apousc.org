<?php 

require_once "../include/session.php";

class Node
{
	// probably should rework the way we record/get node data
	// probably using an info array
	private $value; // username
	private $children;
	private $parent;
	private $family;
	private $name;
	private $pledgeClass;

	public function __construct($username, $fname, $lname, $family, $pledgeClass) {
		$this->setValue($username);
		$this->setName($fname, $lname);
		$this->setFamily($family);
		$this->setPledgeClass($pledgeClass);
	}

	public function getValue() {
		return $this->value;
	}

	public function setValue($item) {
		$this->value = $item;
		return $this;
	}

	public function getChildren() {
		return $this->children;
	}

	public function addChild($child) {
		$this->children[] = $child;
		return $this;
	}

	public function getParent() {
		return $this->parent;
	}

	public function setParent($parent) {
		$this->parent = $parent;
		return $this;
	}

	public function getFamily() {
		return $this->family;
	}

	public function setFamily($familyName) {
		$this->family = $familyName;
		return $this;
	}

	public function getName() {
		return $this->name;
	}

	public function setName($firstName, $lastName) {
		$this->name = $firstName." ".$lastName;
		return $this;
	}

	public function getPledgeClass() {
		return $this->pledgeClass;
	}

	public function setPledgeClass($pledgeClass) {
		$this->pledgeClass = $pledgeClass;
		return $this;
	}

	public function isLeaf() {
		if ($this->children === null)
			return true;
		else
			return false;
	}

	public function isRoot() {
		if ($this->parent === null)
			return true;
		else
			return false;
	}
}

function traverseNodes($node, &$sendResult) {
	// traverses the $node downward, adding up all the data before sending
	$username = $node->getValue();
	if ($node->isRoot()) {
		$parent = "";
	} else {
		$parent = $node->getParent()->getName();
	}
	$family = $node->getFamily();
	$name = $node->getName();
	$pledgeClass = $node->getPledgeClass();
	$nodeData = array(
		"username" => $username,
		"parent" => $parent,
		"name" => $name,
		"family" => $family,
		"pledgeClass" => $pledgeClass,
		);
	$sendResult[] = $nodeData;

	if (!$node->isLeaf()) {
		$children = $node->getChildren();
		foreach ($children as $child) {
			traverseNodes($child, $sendResult);
		}
	}
}


function getDescendants($node) {
	global $database;
	global $pledgeClasses;

	$username = $node->getValue();
	$result = $database->query("SELECT username, fname, lname, family, year, semester FROM users WHERE big = '$username'");
	while ($r = mysql_fetch_assoc($result)) {
		// going through the children
		$childUsername = $r['username'];
		$childFName = $r['fname'];
		$childLName = $r['lname'];
		$childFamily = $r['family'];
		$childPledgeClass = $pledgeClasses[$r['year'].$r['semester']];
		$childNode = new Node($childUsername, $childFName, $childLName, $childFamily, $childPledgeClass);
		$childNode->setParent($node);
		$node->addChild($childNode);
	}
	if ($node->isLeaf()) {
		return; // base case
	}

	$children = $node->getChildren();

	foreach ($children as $child) {
		getDescendants($child);
	}
}

function getTreeRoot($user) {
	// returns the node root of the tree $user belongs to
	global $database;
	global $pledgeClasses;

	$q = "SELECT fname, lname, big, family, year, semester FROM users WHERE username = '$user'";
	$result = $database->query($q);
	$row = mysql_fetch_assoc($result);
	$big = $row['big'];
	while ($big != '') {
		$user = $big;
		$q = "SELECT fname, lname, big, family, year, semester FROM users WHERE username = '$user'";
		$result = $database->query($q);
		$row = mysql_fetch_assoc($result);
		$big = $row['big'];
	}
	$fname = $row['fname'];
	$lname = $row['lname'];
	$family = $row['family'];
	$pledgeClass = $pledgeClasses[$row['year'].$row['semester']];
	$node = new Node($user, $fname, $lname, $family, $pledgeClass);
	return $node;
}