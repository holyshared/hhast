<?hh // strict
/**
 * Copyright (c) 2016, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the root directory of this source tree. An additional
 * grant of patent rights can be found in the PATENTS file in the same
 * directory.
 *
 */

namespace Facebook\HHAST\Linters;

<<__ConsistentConstruct>>
abstract class BaseLinter {
  abstract public function getLintErrors(
  ): Traversable<LintError>;

  public static function shouldLintFile(string $_): bool {
    return true;
  }
  public function __construct(
    private string $file,
  ) {
  }

  final public function getFile(): string {
    return $this->file;
  }
}
