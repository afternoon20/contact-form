# コーディングのテンプレートファイル
## コーディング規約
基本的なコーディングは、[Googleのコーディング規約](https://qiita.com/Sugima/items/785644372397595644ba){:target="_blank"}と、
案件ごとのコーディング規約を優先する。

## HTML
### 要素の横並び
横並びの命名規則は、親要素は「Block-list」とし、子要素は「Block-list__item」とする。
子要素内のElementは、「Block-list__Element」とする。
```html
<!-- NG -->
<ul class="nav__list">
  <li class="nav__list-item">
    <p class="nav_list-item-txt"></p>
  </li>
  <li class="nav__list-item">
    <p class="nav_list-item-txt"></p>
  </li>
</ul>

<!-- OK -->
<ul class="nav-list">
  <li class="nav-list__item">
    <p class="nav-list__txt"></p>
  </li>
  <li class="nav-list__item">
    <p class="nav-list__txt"></p>
  </li>
</ul>
```

## Sass
#### @extendを使う時は、プレースホルダを使用する
@extendによって、意図しないグルーピングが行われてしまい可読性の低下に繋がってしまう。

```scss
// NG
.btn{
    display: block;
    margin: 0 auto;
}

.btn--alert{
    @extend .btn;
    background-color: red;
}

//OK
%btn,.btn{
    display: block;
    margin: 0 auto;
}

.btn--alert{
    @extend %btn;
    background-color: red;
}
```

## エラーの対処
### Windowsでgulpが起動しない。
```bash
Error: Missing binding C:\Users\shimada\Documents\template\node_modules\node-sass\vendor\win32-x64-72\binding.node
```

node-sassをリビルドする。

```bash
npm rebuild node-sass
```


