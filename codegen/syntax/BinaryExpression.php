<?hh
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<02c403e684f434f7037b0bcb1815b0d2>>
 */
namespace Facebook\HHAST;
use type Facebook\TypeAssert\TypeAssert;

final class BinaryExpression extends EditableSyntax {

  private EditableSyntax $_left_operand;
  private EditableSyntax $_operator;
  private EditableSyntax $_right_operand;

  public function __construct(
    EditableSyntax $left_operand,
    EditableSyntax $operator,
    EditableSyntax $right_operand,
  ) {
    parent::__construct('binary_expression');
    $this->_left_operand = $left_operand;
    $this->_operator = $operator;
    $this->_right_operand = $right_operand;
  }

  public static function from_json(
    array<string, mixed> $json,
    int $position,
    string $source,
  ): this {
    $left_operand = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['binary_left_operand'],
      $position,
      $source,
    );
    $position += $left_operand->width();
    $operator = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['binary_operator'],
      $position,
      $source,
    );
    $position += $operator->width();
    $right_operand = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['binary_right_operand'],
      $position,
      $source,
    );
    $position += $right_operand->width();
    return new self($left_operand, $operator, $right_operand);
  }

  public function children(): KeyedTraversable<string, EditableSyntax> {
    yield 'left_operand' => $this->_left_operand;
    yield 'operator' => $this->_operator;
    yield 'right_operand' => $this->_right_operand;
  }

  public function rewrite_children(
    self::TRewriter $rewriter,
    ?Traversable<EditableSyntax> $parents = null,
  ): this {
    $parents = $parents === null ? vec[] : vec($parents);
    $parents[] = $this;
    $left_operand = $this->_left_operand->rewrite($rewriter, $parents);
    $operator = $this->_operator->rewrite($rewriter, $parents);
    $right_operand = $this->_right_operand->rewrite($rewriter, $parents);
    if (
      $left_operand === $this->_left_operand &&
      $operator === $this->_operator &&
      $right_operand === $this->_right_operand
    ) {
      return $this;
    }
    return new self($left_operand, $operator, $right_operand);
  }

  public function raw_left_operand(): EditableSyntax {
    return $this->_left_operand;
  }

  public function with_left_operand(EditableSyntax $value): this {
    if ($value === $this->_left_operand) {
      return $this;
    }
    return new self($value, $this->_operator, $this->_right_operand);
  }

  public function left_operand(): EditableSyntax {
    return TypeAssert::isInstanceOf(EditableSyntax::class, $this->_left_operand);
  }

  public function raw_operator(): EditableSyntax {
    return $this->_operator;
  }

  public function with_operator(EditableSyntax $value): this {
    if ($value === $this->_operator) {
      return $this;
    }
    return new self($this->_left_operand, $value, $this->_right_operand);
  }

  public function operator(): EditableSyntax {
    return TypeAssert::isInstanceOf(EditableSyntax::class, $this->_operator);
  }

  public function raw_right_operand(): EditableSyntax {
    return $this->_right_operand;
  }

  public function with_right_operand(EditableSyntax $value): this {
    if ($value === $this->_right_operand) {
      return $this;
    }
    return new self($this->_left_operand, $this->_operator, $value);
  }

  public function right_operand(): EditableSyntax {
    return TypeAssert::isInstanceOf(EditableSyntax::class, $this->_right_operand);
  }
}