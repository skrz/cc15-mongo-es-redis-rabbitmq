<?php
namespace CC15;

use Skrz\Meta\PHP\PropertySerializerInterface;
use Skrz\Meta\PHP\StatementAndExpressionVO;
use Skrz\Meta\Reflection\ArrayType;
use Skrz\Meta\Reflection\Property;
use Skrz\Meta\Reflection\Type;

class DatetimePassthruPropertySerializer implements PropertySerializerInterface
{

	private function matches(Property $property, $group)
	{
		$baseType = $property->getType();
		while ($baseType instanceof ArrayType) {
			$baseType = $baseType->getBaseType();
		}

		return
			$baseType instanceof Type &&
			strtolower($baseType->getName()) === "datetime";
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
		return StatementAndExpressionVO::withExpression($inputExpression);
	}

	public function deserialize(Property $property, $group, $inputExpression)
	{
		return StatementAndExpressionVO::withExpression($inputExpression);
	}

}
