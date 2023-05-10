# rector-custom-rule-development
RectorのCustom Rule開発環境サンプル

## ディレクトリ構成
```
.
|-- rector.php     // config（実行したいCustom Ruleをここで指定する）
|-- src            // 解析対象のコード置き場
|   `-- SomeClass.php
`-- utils
    `-- rector
        |-- src    // Custom Rule置き場
        |   `-- Rector
        |       `-- SomeRector.php
        `-- tests  // Custom Ruleのテスト置き場
            `-- Rector
                `-- SomeRector
                    |-- Fixture                             // テストデータ
                    |   |-- skip_rule_test_fixture.php.inc  // ルールに違反しないケース
                    |   `-- test_fixture.php.inc            // ルールに違反してリファクタされるケース
                    |-- SomeRectorTest.php                  // テストケース
                    `-- config
                        `-- config.php                      // テスト用のconfig
```

## 参考
- [Rector公式 - Introduction](https://getrector.com/documentation)
- [Rector公式 - Rules Overview](https://getrector.com/documentation/rules-overview)
- [Rector公式 - Custom Rule](https://getrector.com/documentation/custom-rule)
- [Docker×PHPStorm×Xdebugでステップ実行する設定](https://zenn.dev/micronn/articles/5f3cd1d94f99fd)

## 起動
```
make run
```

## イメージ、コンテナの削除
```
make clean
```

## Rector実行
```
XDEBUG_MODE=off ./vendor/bin/rector process --dry-run --clear-cache
XDEBUG_MODE=off ./vendor/bin/rector process --help
```

### ユニットテスト
```
XDEBUG_MODE=off ./vendor/bin/phpunit utils/rector/tests
```

### デバッグ
rector.phpを修正して並行処理を無効化してから`--xdebug`オプションを付けて実行する。
```
./vendor/bin/rector process --dry-run --no-progress-bar --clear-cache --xdebug
```