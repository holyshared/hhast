<?hh
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<2c33f9ed9105338efaeafa99980b2141>>
 */
namespace Facebook\HHAST;
use type Facebook\TypeAssert\TypeAssert;

final class Attribute extends EditableSyntax {

  private EditableSyntax $_name;
  private EditableSyntax $_left_paren;
  private EditableSyntax $_values;
  private EditableSyntax $_right_paren;

  public function __construct(
    EditableSyntax $name,
    EditableSyntax $left_paren,
    EditableSyntax $values,
    EditableSyntax $right_paren,
  ) {
    parent::__construct('attribute');
    $this->_name = $name;
    $this->_left_paren = $left_paren;
    $this->_values = $values;
    $this->_right_paren = $right_paren;
  }

  public static function from_json(
    array<string, mixed> $json,
    int $position,
    string $source,
  ): this {
    $name = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['attribute_name'],
      $position,
      $source,
    );
    $position += $name->width();
    $left_paren = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['attribute_left_paren'],
      $position,
      $source,
    );
    $position += $left_paren->width();
    $values = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['attribute_values'],
      $position,
      $source,
    );
    $position += $values->width();
    $right_paren = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['attribute_right_paren'],
      $position,
      $source,
    );
    $position += $right_paren->width();
    return new self($name, $left_paren, $values, $right_paren);
  }

  public function children(): KeyedTraversable<string, EditableSyntax> {
    yield 'name' => $this->_name;
    yield 'left_paren' => $this->_left_paren;
    yield 'values' => $this->_values;
    yield 'right_paren' => $this->_right_paren;
  }

  public function rewrite_children(
    self::TRewriter $rewriter,
    ?Traversable<EditableSyntax> $parents = null,
  ): this {
    $parents = $parents === null ? vec[] : vec($parents);
    $parents[] = $this;
    $name = $this->_name->rewrite($rewriter, $parents);
    $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
    $values = $this->_values->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    if (
      $name === $this->_name &&
      $left_paren === $this->_left_paren &&
      $values === $this->_values &&
      $right_paren === $this->_right_paren
    ) {
      return $this;
    }
    return new self($name, $left_paren, $values, $right_paren);
  }

  public function raw_name(): EditableSyntax {
    return $this->_name;
  }

  public function with_name(EditableSyntax $value): this {
    if ($value === $this->_name) {
      return $this;
    }
    return new self($value, $this->_left_paren, $this->_values, $this->_right_paren);
  }

  public function name(): NameToken {
    return TypeAssert::isInstanceOf(NameToken::class, $this->_name);
  }

  public function raw_left_paren(): EditableSyntax {
    return $this->_left_paren;
  }

  public function with_left_paren(EditableSyntax $value): this {
    if ($value === $this->_left_paren) {
      return $this;
    }
    return new self($this->_name, $value, $this->_values, $this->_right_paren);
  }

  public function left_paren(): ?LeftParenToken {
    if ($this->_left_paren->is_missing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(LeftParenToken::class, $this->_left_paren);
  }

  public function left_parenx(): LeftParenToken {
    return TypeAssert::isInstanceOf(LeftParenToken::class, $this->_left_paren);
  }

  public function raw_values(): EditableSyntax {
    return $this->_values;
  }

  public function with_values(EditableSyntax $value): this {
    if ($value === $this->_values) {
      return $this;
    }
    return new self($this->_name, $this->_left_paren, $value, $this->_right_paren);
  }

  public function values(): ?EditableList {
    if ($this->_values->is_missing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(EditableList::class, $this->_values);
  }

  public function valuesx(): EditableList {
    return TypeAssert::isInstanceOf(EditableList::class, $this->_values);
  }

  public function raw_right_paren(): EditableSyntax {
    return $this->_right_paren;
  }

  public function with_right_paren(EditableSyntax $value): this {
    if ($value === $this->_right_paren) {
      return $this;
    }
    return new self($this->_name, $this->_left_paren, $this->_values, $value);
  }

  public function right_paren(): ?RightParenToken {
    if ($this->_right_paren->is_missing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(RightParenToken::class, $this->_right_paren);
  }

  public function right_parenx(): RightParenToken {
    return TypeAssert::isInstanceOf(RightParenToken::class, $this->_right_paren);
  }
}