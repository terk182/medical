<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery Sortable Lists Plugin Demo</title>
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    html, body, ul, li { margin:0; padding:0; }
    body { font-family:verdana; background: #3d4f61; color:#fff; }
    ul, li { list-style-type:none; padding:3px; color:#fff; border:1px solid #000; }
    ul { padding:10px; }
    ul li { padding-left:50px; margin:10px 0; border:1px solid #000; }
    li div { padding:7px; background-color:#D870A9; border:1px solid #000; }
    li, ul, div { border-radius: 3px; }
    .scrollUp { position:fixed; top:0; left:0; height:48px; width:50px; border:1px solid red; }
    .scrollDown { position:fixed; bottom:0; left:0; height:48px; width:50px; border:1px solid red; }
    .sortableListsClose ul, .sortableListsClose ol { display:none; }
    .red { background-color:#ff9999;}
    .blue { background-color:#D870A9;}
    .green { background-color:#99ff99; }
    .pV10 { padding-top:10px; padding-bottom:10px; }
    .dN { display:none; }
    .zI1000 { z-index:1000; }
    .bgC1 { background-color:#ccc; }
    .bgC2 { background-color:#ff8; }
    .bgC3 { background-color:#f0f; }
    .bgC4 { background-color:#ED87BD; }
    .small1 { font-size:0.8em; }
    .small2 { font-size:0.7em; }
    .small3 { font-size:0.6em; }
    #sTreeBase { width:100px; height:50px; background-color: blue; }
    #text { padding:10px 0; }
    #sTree { background-color: green; }
    #sTree2 { margin:10px 0; }
    #center { width:950px; margin:0 auto; padding:10px; }
  </style>

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="jquery-sortable-lists.js"></script>
  <script type="text/javascript">
    $(function()
    {
      var options = {
        placeholderCss: {'background-color': '#ff8'},
    hintCss: {'background-color':'#bbf'},
    onChange: function( cEl )
    {
      console.log( 'onChange' );
    },
    complete: function( cEl )
    {
      console.log( 'complete' );
    },
    isAllowed: function( cEl, hint, target )
    {
      // Be carefull if you test some ul/ol elements here.
      // Sometimes ul/ols are dynamically generated and so they have not some attributes as natural ul/ols.
      // Be careful also if the hint is not visible. It has only display none so it is at the previouse place where it was before(excluding first moves before showing).
      if( target.data('module') === 'c' && cEl.data('module') !== 'c' )
      {
        hint.css('background-color', '#ff9999');
        return false;
      }
      else
      {
        hint.css('background-color', '#99ff99');
        return true;
      }
    },
    opener: {
      active: true,
      as: 'html',  // if as is not set plugin uses background image
      close: '<i class="fa fa-minus c3"></i>',  // or 'fa-minus c3',  // or './imgs/Remove2.png',
      open: '<i class="fa fa-plus"></i>',  // or 'fa-plus',  // or'./imgs/Add2.png',
      openerCss: {
        'display': 'inline-block',
        //'width': '18px', 'height': '18px',
        'float': 'left',
        'margin-left': '-35px',
        'margin-right': '5px',
        //'background-position': 'center center', 'background-repeat': 'no-repeat',
        'font-size': '1.1em'
      }
    },
    ignoreClass: 'clickable'
      };
      $('#sTree2').sortableLists(options);

      console.log($('#sTree2').sortableListsToArray());
      console.log($('#sTree2').sortableListsToHierarchy());
      console.log($('#sTree2').sortableListsToString());
    });
  </script>
</head>
<body>

<div id="center">

  <h1>
    jQuery Sortable Lists Plugin Demo<br>
  </h1>
<div class="jquery-script-ads"><script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript" src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
  <ul class="sTree bgC4" id="sTree2">
    <li class="bgC4" id="item_a">
      <div>Item a</div>
    </li>
    <li class="bgC4" id="item_b">
      <div>Item b</div>
    </li>
    <li class="bgC4 sortableListsClose" id="item_c">
      <div><span class="sortableListsOpener"> </span>Item c</div>
      <ul class="">
        <li class="bgC4" id="item_1">
          <div>Item 1</div>
        </li>
        <li class="bgC4" id="item_2">
          <div>Item 2</div>
        </li>
        <li class="bgC4" id="item_3">
          <div>Item 3</div>
        </li>
        <li class="bgC4" id="item_4">
          <div>Item 4</div>
        </li>
        <li class="bgC4" id="item_5">
          <div>Item 5</div>
        </li>
        <li class="bgC4 sortableListsClose" id="item_c">
          <div><span class="sortableListsOpener"> </span>Item c</div>
          <ul class="">
            <li class="bgC4" id="item_1">
              <div>Item 1</div>
            </li>
            <li class="bgC4" id="item_2">
              <div>Item 2</div>
            </li>
            <li class="bgC4" id="item_3">
              <div>Item 3</div>
            </li>
            <li class="bgC4" id="item_4">
              <div>Item 4</div>
            </li>
            <li class="bgC4" id="item_5">
              <div>Item 5</div>
            </li>
          </ul>
        </li>
      </ul>
    </li>
    <li class="bgC4 sortableListsClose" id="item_d">
      <div><span class="sortableListsOpener"> </span>Item c</div>
      <ul class="">
        <li class="bgC4" id="item_1">
          <div>Item 1</div>
        </li>
        <li class="bgC4" id="item_2">
          <div>Item 2</div>
        </li>
        <li class="bgC4" id="item_3">
          <div>Item 3</div>
        </li>
        <li class="bgC4" id="item_4">
          <div>Item 4</div>
        </li>
        <li class="bgC4" id="item_5">
          <div>Item 5</div>
        </li>
      </ul>
    </li>
    <li class="bgC4 sortableListsClose" id="item_a">
      <div><span class="sortableListsOpener"> </span>Item c</div>
      <ul class="">
        <li class="bgC4" id="item_1">
          <div>Item 1</div>
        </li>
        <li class="bgC4" id="item_2">
          <div>Item 2</div>
        </li>
        <li class="bgC4" id="item_3">
          <div>Item 3</div>
        </li>
        <li class="bgC4" id="item_4">
          <div>Item 4</div>
        </li>
        <li class="bgC4" id="item_5">
          <div>Item 5</div>
        </li>
        
      </ul>

      <li class="bgC4 sortableListsClose" id="item_a">
      <div><span class="sortableListsOpener"> </span>Item c</div>
      <ul class="">
        <li class="bgC4" id="item_1">
          <div>Item 1</div>
        </li>
        <li class="bgC4" id="item_2">
          <div>Item 2</div>
        </li>
        <li class="bgC4" id="item_3">
          <div>Item 3</div>
        </li>
        <li class="bgC4" id="item_4">
          <div>Item 4</div>
        </li>
        <li class="bgC4" id="item_5">
          <div>Item 5</div>
        </li>
        
      </ul>
    </li>
    </li>
  </ul>

  <div class="scrollUp dN"></div>
  <div class="scrollDown dN"></div>

</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>

