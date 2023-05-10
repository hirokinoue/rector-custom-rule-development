<?php

namespace Utils\Rector\Tests\Rector\MyFirstRector\Fixture;

class MyFirst
{
    public function hierophantEmerald(): void {}
}
?>
-----
<?php

namespace Utils\Rector\Tests\Rector\MyFirstRector\Fixture;

class MyFirst
{
    public function hierophantGreen(): void {}
}
?>