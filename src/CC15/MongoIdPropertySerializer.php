<?php
namespace CC15;

use Skrz\Meta\PHP\PropertySerializerInterface;
use Skrz\Meta\PHP\StatementAndExpressionVO;
use Skrz\Meta\Reflection\ArrayType;
use Skrz\Meta\Reflection\Property;
use Skrz\Meta\Reflection\Type;

class MongoIdPropertySerializer implements PropertySerializerInterface
{

	/** @var string[] */
	private $stringifyGroups = null;

	public function addStringifyGroup($group)
	{
		$this->stringifyGroups = (array)$this->stringifyGroups;
		$this->stringifyGroups[] = $group;
		return $this;
	}

	private function matches(Property $property, $group)
	{
		$baseType = $property->getType();
		while ($baseType instanceof ArrayType) {
			$baseType = $baseType->getBaseType();
		}

		return
			$baseType instanceof Type &&
			strtolower($baseType->getName()) === "mongoid";
	}

	public function matchesSerialize(Property $property, $group)
	{
		return $this->matches($property, $group);
	}

	public function matchesDeserialize(Property $property, $group)
	{
		return $this->matches($property, $group);
	}

	public function serialize(Property $property, $group, $inputExpression)
	{
		if ($this->stringifyGroups !== null && in_array($group, $this->stringifyGroups)) {
			return StatementAndExpressionVO::withExpression("(string){$inputExpression}");
		} else {
			return StatementAndExpressionVO::withExpression($inputExpression);
		}
	}

	public function deserialize(Property $property, $group, $inputExpression)
	{
		if ($this->stringifyGroups !== null && in_array($group, $this->stringifyGroups)) {
			return StatementAndExpressionVO::withExpression("new \\MongoId({$inputExpression})");
		} else {
			return StatementAndExpressionVO::withExpression($inputExpression);
		}
	}

}
