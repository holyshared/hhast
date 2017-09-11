<?hh
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<48208fe840b8fbc435318e8cb38c8d05>>
 */
namespace Facebook\HHAST;
use type Facebook\TypeAssert\TypeAssert;

final class NamespaceUseClause extends EditableSyntax {

  private EditableSyntax $_clause_kind;
  private EditableSyntax $_name;
  private EditableSyntax $_as;
  private EditableSyntax $_alias;

  public function __construct(
    EditableSyntax $clause_kind,
    EditableSyntax $name,
    EditableSyntax $as,
    EditableSyntax $alias,
  ) {
    parent::__construct('namespace_use_clause');
    $this->_clause_kind = $clause_kind;
    $this->_name = $name;
    $this->_as = $as;
    $this->_alias = $alias;
  }

  public static function from_json(
    array<string, mixed> $json,
    int $position,
    string $source,
  ): this {
    $clause_kind = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['namespace_use_clause_kind'],
      $position,
      $source,
    );
    $position += $clause_kind->width();
    $name = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['namespace_use_name'],
      $position,
      $source,
    );
    $position += $name->width();
    $as = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['namespace_use_as'],
      $position,
      $source,
    );
    $position += $as->width();
    $alias = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['namespace_use_alias'],
      $position,
      $source,
    );
    $position += $alias->width();
    return new self($clause_kind, $name, $as, $alias);
  }

  public function children(): KeyedTraversable<string, EditableSyntax> {
    yield 'clause_kind' => $this->_clause_kind;
    yield 'name' => $this->_name;
    yield 'as' => $this->_as;
    yield 'alias' => $this->_alias;
  }

  public function rewrite_children(
    self::TRewriter $rewriter,
    ?Traversable<EditableSyntax> $parents = null,
  ): this {
    $parents = $parents === null ? vec[] : vec($parents);
    $parents[] = $this;
    $clause_kind = $this->_clause_kind->rewrite($rewriter, $parents);
    $name = $this->_name->rewrite($rewriter, $parents);
    $as = $this->_as->rewrite($rewriter, $parents);
    $alias = $this->_alias->rewrite($rewriter, $parents);
    if (
      $clause_kind === $this->_clause_kind &&
      $name === $this->_name &&
      $as === $this->_as &&
      $alias === $this->_alias
    ) {
      return $this;
    }
    return new self($clause_kind, $name, $as, $alias);
  }

  public function raw_clause_kind(): EditableSyntax {
    return $this->_clause_kind;
  }

  public function with_clause_kind(EditableSyntax $value): this {
    if ($value === $this->_clause_kind) {
      return $this;
    }
    return new self($value, $this->_name, $this->_as, $this->_alias);
  }

  public function clause_kind(): EditableSyntax {
    return TypeAssert::isInstanceOf(EditableSyntax::class, $this->_clause_kind);
  }

  public function raw_name(): EditableSyntax {
    return $this->_name;
  }

  public function with_name(EditableSyntax $value): this {
    if ($value === $this->_name) {
      return $this;
    }
    return new self($this->_clause_kind, $value, $this->_as, $this->_alias);
  }

  public function name(): EditableSyntax {
    return TypeAssert::isInstanceOf(EditableSyntax::class, $this->_name);
  }

  public function raw_as(): EditableSyntax {
    return $this->_as;
  }

  public function with_as(EditableSyntax $value): this {
    if ($value === $this->_as) {
      return $this;
    }
    return new self($this->_clause_kind, $this->_name, $value, $this->_alias);
  }

  public function as(): ?AsToken {
    if ($this->_as->is_missing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(AsToken::class, $this->_as);
  }

  public function asx(): AsToken {
    return TypeAssert::isInstanceOf(AsToken::class, $this->_as);
  }

  public function raw_alias(): EditableSyntax {
    return $this->_alias;
  }

  public function with_alias(EditableSyntax $value): this {
    if ($value === $this->_alias) {
      return $this;
    }
    return new self($this->_clause_kind, $this->_name, $this->_as, $value);
  }

  public function alias(): ?NameToken {
    if ($this->_alias->is_missing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(NameToken::class, $this->_alias);
  }

  public function aliasx(): NameToken {
    return TypeAssert::isInstanceOf(NameToken::class, $this->_alias);
  }
}