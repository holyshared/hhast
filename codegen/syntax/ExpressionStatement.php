<?hh
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a57ce90ce95ad2718ae6134bc7e713ee>>
 */
namespace Facebook\HHAST;
use type Facebook\TypeAssert\TypeAssert;

final class ExpressionStatement extends EditableSyntax {

  private EditableSyntax $_expression;
  private EditableSyntax $_semicolon;

  public function __construct(
    EditableSyntax $expression,
    EditableSyntax $semicolon,
  ) {
    parent::__construct('expression_statement');
    $this->_expression = $expression;
    $this->_semicolon = $semicolon;
  }

  public static function from_json(
    array<string, mixed> $json,
    int $position,
    string $source,
  ): this {
    $expression = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['expression_statement_expression'],
      $position,
      $source,
    );
    $position += $expression->width();
    $semicolon = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['expression_statement_semicolon'],
      $position,
      $source,
    );
    $position += $semicolon->width();
    return new self($expression, $semicolon);
  }

  public function children(): KeyedTraversable<string, EditableSyntax> {
    yield 'expression' => $this->_expression;
    yield 'semicolon' => $this->_semicolon;
  }

  public function rewrite_children(
    self::TRewriter $rewriter,
    ?Traversable<EditableSyntax> $parents = null,
  ): this {
    $parents = $parents === null ? vec[] : vec($parents);
    $parents[] = $this;
    $expression = $this->_expression->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $expression === $this->_expression &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new self($expression, $semicolon);
  }

  public function raw_expression(): EditableSyntax {
    return $this->_expression;
  }

  public function with_expression(EditableSyntax $value): this {
    if ($value === $this->_expression) {
      return $this;
    }
    return new self($value, $this->_semicolon);
  }

  public function expression(): EditableSyntax {
    return TypeAssert::isInstanceOf(EditableSyntax::class, $this->_expression);
  }

  public function raw_semicolon(): EditableSyntax {
    return $this->_semicolon;
  }

  public function with_semicolon(EditableSyntax $value): this {
    if ($value === $this->_semicolon) {
      return $this;
    }
    return new self($this->_expression, $value);
  }

  public function semicolon(): ?SemicolonToken {
    if ($this->_semicolon->is_missing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(SemicolonToken::class, $this->_semicolon);
  }

  public function semicolonx(): SemicolonToken {
    return TypeAssert::isInstanceOf(SemicolonToken::class, $this->_semicolon);
  }
}