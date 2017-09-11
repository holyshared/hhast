<?hh
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5a3105a88748f583eb37e83d5147c65a>>
 */
namespace Facebook\HHAST;
use type Facebook\TypeAssert\TypeAssert;

final class EmbeddedBracedExpression extends EditableSyntax {

  private EditableSyntax $_left_brace;
  private EditableSyntax $_expression;
  private EditableSyntax $_right_brace;

  public function __construct(
    EditableSyntax $left_brace,
    EditableSyntax $expression,
    EditableSyntax $right_brace,
  ) {
    parent::__construct('embedded_braced_expression');
    $this->_left_brace = $left_brace;
    $this->_expression = $expression;
    $this->_right_brace = $right_brace;
  }

  public static function from_json(
    array<string, mixed> $json,
    int $position,
    string $source,
  ): this {
    $left_brace = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['embedded_braced_expression_left_brace'],
      $position,
      $source,
    );
    $position += $left_brace->width();
    $expression = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['embedded_braced_expression_expression'],
      $position,
      $source,
    );
    $position += $expression->width();
    $right_brace = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['embedded_braced_expression_right_brace'],
      $position,
      $source,
    );
    $position += $right_brace->width();
    return new self($left_brace, $expression, $right_brace);
  }

  public function children(): KeyedTraversable<string, EditableSyntax> {
    yield 'left_brace' => $this->_left_brace;
    yield 'expression' => $this->_expression;
    yield 'right_brace' => $this->_right_brace;
  }

  public function rewrite_children(
    self::TRewriter $rewriter,
    ?Traversable<EditableSyntax> $parents = null,
  ): this {
    $parents = $parents === null ? vec[] : vec($parents);
    $parents[] = $this;
    $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
    $expression = $this->_expression->rewrite($rewriter, $parents);
    $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
    if (
      $left_brace === $this->_left_brace &&
      $expression === $this->_expression &&
      $right_brace === $this->_right_brace
    ) {
      return $this;
    }
    return new self($left_brace, $expression, $right_brace);
  }

  public function raw_left_brace(): EditableSyntax {
    return $this->_left_brace;
  }

  public function with_left_brace(EditableSyntax $value): this {
    if ($value === $this->_left_brace) {
      return $this;
    }
    return new self($value, $this->_expression, $this->_right_brace);
  }

  public function left_brace(): EditableSyntax {
    return TypeAssert::isInstanceOf(EditableSyntax::class, $this->_left_brace);
  }

  public function raw_expression(): EditableSyntax {
    return $this->_expression;
  }

  public function with_expression(EditableSyntax $value): this {
    if ($value === $this->_expression) {
      return $this;
    }
    return new self($this->_left_brace, $value, $this->_right_brace);
  }

  public function expression(): EditableSyntax {
    return TypeAssert::isInstanceOf(EditableSyntax::class, $this->_expression);
  }

  public function raw_right_brace(): EditableSyntax {
    return $this->_right_brace;
  }

  public function with_right_brace(EditableSyntax $value): this {
    if ($value === $this->_right_brace) {
      return $this;
    }
    return new self($this->_left_brace, $this->_expression, $value);
  }

  public function right_brace(): EditableSyntax {
    return TypeAssert::isInstanceOf(EditableSyntax::class, $this->_right_brace);
  }
}