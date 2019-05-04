<map version="freeplane 1.6.0">
<!--To view this file, download free mind mapping software Freeplane from http://freeplane.sourceforge.net -->
<node TEXT="GPAO Resources" FOLDED="false" ID="ID_864505857" CREATED="1556938679364" MODIFIED="1556938706117" STYLE="oval">
<font SIZE="18"/>
<hook NAME="MapStyle" zoom="1.61">
    <properties edgeColorConfiguration="#808080ff,#ff0000ff,#0000ffff,#00ff00ff,#ff00ffff,#00ffffff,#7c0000ff,#00007cff,#007c00ff,#7c007cff,#007c7cff,#7c7c00ff" fit_to_viewport="false" show_note_icons="true"/>

<map_styles>
<stylenode LOCALIZED_TEXT="styles.root_node" STYLE="oval" UNIFORM_SHAPE="true" VGAP_QUANTITY="24.0 pt">
<font SIZE="24"/>
<stylenode LOCALIZED_TEXT="styles.predefined" POSITION="right" STYLE="bubble">
<stylenode LOCALIZED_TEXT="default" ICON_SIZE="12.0 pt" COLOR="#000000" STYLE="fork">
<font NAME="SansSerif" SIZE="10" BOLD="false" ITALIC="false"/>
</stylenode>
<stylenode LOCALIZED_TEXT="defaultstyle.details"/>
<stylenode LOCALIZED_TEXT="defaultstyle.attributes">
<font SIZE="9"/>
</stylenode>
<stylenode LOCALIZED_TEXT="defaultstyle.note" COLOR="#000000" BACKGROUND_COLOR="#ffffff" TEXT_ALIGN="LEFT"/>
<stylenode LOCALIZED_TEXT="defaultstyle.floating">
<edge STYLE="hide_edge"/>
<cloud COLOR="#f0f0f0" SHAPE="ROUND_RECT"/>
</stylenode>
</stylenode>
<stylenode LOCALIZED_TEXT="styles.user-defined" POSITION="right" STYLE="bubble">
<stylenode LOCALIZED_TEXT="styles.topic" COLOR="#18898b" STYLE="fork">
<font NAME="Liberation Sans" SIZE="10" BOLD="true"/>
</stylenode>
<stylenode LOCALIZED_TEXT="styles.subtopic" COLOR="#cc3300" STYLE="fork">
<font NAME="Liberation Sans" SIZE="10" BOLD="true"/>
</stylenode>
<stylenode LOCALIZED_TEXT="styles.subsubtopic" COLOR="#669900">
<font NAME="Liberation Sans" SIZE="10" BOLD="true"/>
</stylenode>
<stylenode LOCALIZED_TEXT="styles.important">
<icon BUILTIN="yes"/>
</stylenode>
</stylenode>
<stylenode LOCALIZED_TEXT="styles.AutomaticLayout" POSITION="right" STYLE="bubble">
<stylenode LOCALIZED_TEXT="AutomaticLayout.level.root" COLOR="#000000" STYLE="oval" SHAPE_HORIZONTAL_MARGIN="10.0 pt" SHAPE_VERTICAL_MARGIN="10.0 pt">
<font SIZE="18"/>
</stylenode>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,1" COLOR="#0033ff">
<font SIZE="16"/>
</stylenode>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,2" COLOR="#00b439">
<font SIZE="14"/>
</stylenode>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,3" COLOR="#990000">
<font SIZE="12"/>
</stylenode>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,4" COLOR="#111111">
<font SIZE="10"/>
</stylenode>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,5"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,6"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,7"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,8"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,9"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,10"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,11"/>
</stylenode>
</stylenode>
</map_styles>
</hook>
<hook NAME="AutomaticEdgeColor" COUNTER="16" RULE="ON_BRANCH_CREATION"/>
<node TEXT="Entrep&#xf4;ts" POSITION="right" ID="ID_1186094358" CREATED="1556938778035" MODIFIED="1556940162915">
<edge COLOR="#0000ff"/>
<node TEXT="produit existant" ID="ID_112495763" CREATED="1556947098865" MODIFIED="1556947173629"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="5">niveau entrep&#244;t &gt; 0</font>
    </p>
  </body>
</html>

</richcontent>
<node TEXT="ligne d&apos;un produit" FOLDED="true" ID="ID_1482815803" CREATED="1556943320158" MODIFIED="1556943331267">
<node TEXT="donn&#xe9;es issues du jeu" ID="ID_354597334" CREATED="1556940045307" MODIFIED="1556942363759"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="4">mise sous forme d'un tableau avec un bouton d&#233;tail pour acc&#233;der au rapport</font>
    </p>
  </body>
</html>

</richcontent>
<node TEXT="ic&#xf4;ne" ID="ID_1755495690" CREATED="1556940135879" MODIFIED="1556940140127"/>
<node TEXT="nom" ID="ID_756821741" CREATED="1556940142840" MODIFIED="1556940146984"/>
<node TEXT="quantit&#xe9;" ID="ID_623244894" CREATED="1556940148197" MODIFIED="1556940153090"/>
<node TEXT="niveau" ID="ID_206648313" CREATED="1556940170400" MODIFIED="1556940175920"/>
<node TEXT="capacit&#xe9;" ID="ID_121199517" CREATED="1556940179401" MODIFIED="1556940210469"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      elle est directement fonction du niveau
    </p>
  </body>
</html>

</richcontent>
</node>
</node>
<node TEXT="&#xe9;tat entrep&#xf4;t sous forme de feu" ID="ID_822325739" CREATED="1556943114718" MODIFIED="1556943686881">
<node TEXT="feu vert: inutile" ID="ID_1808638613" CREATED="1556943131369" MODIFIED="1556943159735"/>
<node TEXT="feu orange: conseill&#xe9;" ID="ID_1138203944" CREATED="1556943149588" MODIFIED="1556943232288"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="4">capacit&#233; &lt; m&#233;diane des besoins</font>
    </p>
  </body>
</html>

</richcontent>
</node>
<node TEXT="feu rouge: obligatoire" ID="ID_1426620634" CREATED="1556943239734" MODIFIED="1556943288542"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="4">capacit&#233; &lt; max des besoins</font>
    </p>
  </body>
</html>

</richcontent>
</node>
</node>
<node TEXT="bouton d&#xe9;tail" ID="ID_1458453222" CREATED="1556943463262" MODIFIED="1556943506587"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      enclenche l'affichage du rapport sou la ligne
    </p>
  </body>
</html>

</richcontent>
</node>
</node>
<node TEXT="rapport d&#xe9;taill&#xe9;" ID="ID_1969995935" CREATED="1556941795010" MODIFIED="1556941964852"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="4">il appairait sous la ligne de produit lorsqu'on appuie sur son bouton d&#233;tail</font>
    </p>
  </body>
</html>

</richcontent>
<node TEXT="liste des besoins" ID="ID_1653679582" CREATED="1556940063295" MODIFIED="1556942573375"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      un besoin est d&#233;fini par
    </p>
    <p>
      un produit
    </p>
    <p>
      une quantit&#233;
    </p>
    <p>
      une date &#224; laquelle doit &#234;tre satisfait le besoin
    </p>
  </body>
</html>

</richcontent>
<node TEXT="pour production" ID="ID_1105126947" CREATED="1556942057581" MODIFIED="1556942492196"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="4">avec des liens vers usines, mines et produits impliqu&#233;s</font>
    </p>
  </body>
</html>

</richcontent>
</node>
<node TEXT="pour am&#xe9;lioration" ID="ID_1789141643" CREATED="1556942078212" MODIFIED="1556942088921"/>
<node TEXT="d&#xe9;fini par l&apos;utilisateur" ID="ID_588420299" CREATED="1556942090728" MODIFIED="1556942102109"/>
</node>
<node TEXT="&#xe9;volution du stock" ID="ID_246319041" CREATED="1556940074485" MODIFIED="1556940083339"/>
<node TEXT="conseils" ID="ID_1143451845" CREATED="1556940085002" MODIFIED="1556942889861">
<node TEXT="entrep&#xf4;t vide" ID="ID_1864663315" CREATED="1556940096596" MODIFIED="1556940113596">
<node TEXT="acheter" ID="ID_1004834123" CREATED="1556940302489" MODIFIED="1556940312701"/>
<node TEXT="diminuer consommation interne" ID="ID_1037770882" CREATED="1556940315095" MODIFIED="1556940322517"/>
</node>
<node TEXT="entrep&#xf4;t plein" FOLDED="true" ID="ID_671306308" CREATED="1556940116452" MODIFIED="1556940122050">
<node TEXT="augmenter entrep&#xf4;t" ID="ID_1833628364" CREATED="1556940327446" MODIFIED="1556940336967"/>
<node TEXT="vendre" ID="ID_1462866875" CREATED="1556940342058" MODIFIED="1556940347529"/>
</node>
<node TEXT="augmenter entrep&#xf4;t" ID="ID_1207449735" CREATED="1556943114718" MODIFIED="1556943130820"/>
</node>
<node TEXT="ordres" ID="ID_1563635942" CREATED="1556942841012" MODIFIED="1556942845967">
<node TEXT="acheter" ID="ID_405700979" CREATED="1556942896928" MODIFIED="1556942900826"/>
<node TEXT="vendre" ID="ID_729794706" CREATED="1556942910204" MODIFIED="1556942914510"/>
<node TEXT="augmenter entrep&#xf4;t" ID="ID_343329945" CREATED="1556942918793" MODIFIED="1556942936333"/>
<node TEXT="d&#xe9;finir un besoin" ID="ID_1786614428" CREATED="1556945753663" MODIFIED="1556945880017"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="4">Le besoins pour am&#233;lioration ou production sont d&#233;j&#224; comptabilis&#233;s. On peut d&#233;finir les autres besoins comme la quantit&#233; n&#233;cessaire pour r&#233;aliser une mission ou tout autre besoin</font>
    </p>
  </body>
</html>

</richcontent>
</node>
</node>
<node TEXT="missions int&#xe9;ressantes" ID="ID_1170735660" CREATED="1556942602106" MODIFIED="1556942756822"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      avec un lien pour chaque mission
    </p>
  </body>
</html>

</richcontent>
<node TEXT="produit utile pour r&#xe9;aliser une mission" ID="ID_1024757804" CREATED="1556942620819" MODIFIED="1556942959721"/>
<node TEXT="r&#xe9;compense de mission" ID="ID_368008787" CREATED="1556942647293" MODIFIED="1556942653824"/>
</node>
<node TEXT="utile pour..." ID="ID_228317306" CREATED="1556945677374" MODIFIED="1556945687374">
<node TEXT="produire" ID="ID_1986405435" CREATED="1556945694285" MODIFIED="1556945698403"/>
<node TEXT="am&#xe9;liorer" ID="ID_1511578374" CREATED="1556945700986" MODIFIED="1556945713377"/>
</node>
</node>
</node>
<node TEXT="produit non stock&#xe9;" ID="ID_1506113906" CREATED="1556947116052" MODIFIED="1556947251020"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="5">niveau entrep&#244;t = 0 </font>
    </p>
    <p>
      <font size="5">Il suffit d'acheter le produit pour que l'entrep&#244;t soit cr&#233;&#233;.</font>
    </p>
  </body>
</html>

</richcontent>
</node>
</node>
<node TEXT="Usines" POSITION="right" ID="ID_1938459071" CREATED="1556939765740" MODIFIED="1556939769821">
<edge COLOR="#7c7c00"/>
<node TEXT="usine existante" ID="ID_312571701" CREATED="1556946757815" MODIFIED="1556946898308"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="5">niveau &gt; 0</font>
    </p>
  </body>
</html>

</richcontent>
<node TEXT="ligne d&apos;une usine" FOLDED="true" ID="ID_1075947622" CREATED="1556943966083" MODIFIED="1556943977347">
<node TEXT="donn&#xe9;es issues du jeu" ID="ID_1304962010" CREATED="1556940045307" MODIFIED="1556942363759"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="4">mise sous forme d'un tableau avec un bouton d&#233;tail pour acc&#233;der au rapport</font>
    </p>
  </body>
</html>
</richcontent>
<node TEXT="ic&#xf4;ne" ID="ID_1143614068" CREATED="1556940135879" MODIFIED="1556940140127"/>
<node TEXT="nom" ID="ID_1031108648" CREATED="1556940142840" MODIFIED="1556940146984"/>
<node TEXT="niveau" ID="ID_1815990748" CREATED="1556940170400" MODIFIED="1556940175920"/>
<node TEXT="capacit&#xe9; de production" ID="ID_1222845773" CREATED="1556944208938" MODIFIED="1556944222963"/>
<node TEXT="quantit&#xe9; en production" ID="ID_485282825" CREATED="1556944262103" MODIFIED="1556944269550"/>
<node TEXT="quantit&#xe9; produite" ID="ID_1798878002" CREATED="1556944270013" MODIFIED="1556944277266"/>
<node TEXT="temps restant de production" ID="ID_1940504579" CREATED="1556944281255" MODIFIED="1556944592424"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      information d&#233;pendante de l'heure
    </p>
  </body>
</html>

</richcontent>
</node>
<node TEXT="la recette" ID="ID_1851078358" CREATED="1556944726146" MODIFIED="1556944733127">
<node TEXT="ingr&#xe9;dients" ID="ID_313763558" CREATED="1556945539009" MODIFIED="1556945549104"/>
<node TEXT="quantit&#xe9; du r&#xe9;sultat" ID="ID_411996433" CREATED="1556945551559" MODIFIED="1556945566085"/>
<node TEXT="somme n&#xe9;cessaire" ID="ID_163764660" CREATED="1556945566750" MODIFIED="1556945572828"/>
</node>
</node>
<node TEXT="autosuffisance?" ID="ID_1612473667" CREATED="1556944072120" MODIFIED="1556944931166">
<node TEXT="rouge" ID="ID_1072743581" CREATED="1556944114371" MODIFIED="1556945256235"/>
<node TEXT="vert" ID="ID_1468470199" CREATED="1556944137279" MODIFIED="1556945271091"/>
</node>
</node>
<node TEXT="rapport d&#xe9;taill&#xe9;" FOLDED="true" ID="ID_1915297" CREATED="1556943981223" MODIFIED="1556943988017">
<node TEXT="production souhait&#xe9;e" ID="ID_1947607608" CREATED="1556944607764" MODIFIED="1556944695902"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="4">Elle est d&#233;finie par l'utilisateur et d&#233;termine les besoins de production</font>
    </p>
  </body>
</html>

</richcontent>
<node TEXT="en dur&#xe9;e" ID="ID_274056600" CREATED="1556944624141" MODIFIED="1556945998175"/>
<node TEXT="en quantit&#xe9;" ID="ID_1186373317" CREATED="1556944640365" MODIFIED="1556946004676"/>
</node>
<node TEXT="les besoins pour la production souhait&#xe9;e" ID="ID_1118515745" CREATED="1556944740752" MODIFIED="1556944762420"/>
<node TEXT="les fournisseurs internes" ID="ID_751161399" CREATED="1556945030440" MODIFIED="1556945048282"/>
<node TEXT="les clients internes" ID="ID_311569896" CREATED="1556945049102" MODIFIED="1556945056142"/>
<node TEXT="la prod ne couvre-t-elle les besoins internes?" ID="ID_1110556440" CREATED="1556944114371" MODIFIED="1556946314207"/>
<node TEXT="conseils" ID="ID_1875812789" CREATED="1556944836039" MODIFIED="1556946432418"/>
<node TEXT="ordres" ID="ID_1515273162" CREATED="1556944774319" MODIFIED="1556944784522">
<node TEXT="choisir production d&#xe9;sir&#xe9;e" ID="ID_1513948918" CREATED="1556944798534" MODIFIED="1556946027296"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="4">N'impacte pas la production en cours. Elle permet de d&#233;finir les futures besoins</font>
    </p>
  </body>
</html>

</richcontent>
<node TEXT="soit en dur&#xe9;e" ID="ID_561283307" CREATED="1556946045248" MODIFIED="1556946054034"/>
<node TEXT="soit en quantit&#xe9;" ID="ID_276743670" CREATED="1556946056172" MODIFIED="1556946061900"/>
</node>
<node TEXT="augmenter le niveau" ID="ID_1682931375" CREATED="1556944823161" MODIFIED="1556945476125"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      permet d'ajouter les besoins pour am&#233;lioration
    </p>
  </body>
</html>

</richcontent>
</node>
<node TEXT="acheter" ID="ID_1903114567" CREATED="1556945361665" MODIFIED="1556945365968"/>
</node>
</node>
</node>
<node TEXT="acheter une nouvelle usine" ID="ID_862750268" CREATED="1556946698627" MODIFIED="1556946906704"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="5">niveau = 0</font>
    </p>
  </body>
</html>

</richcontent>
<node TEXT="prix" ID="ID_1571591944" CREATED="1556946802798" MODIFIED="1556946806740"/>
<node TEXT="mat&#xe9;riaux n&#xe9;cessaire" ID="ID_635407091" CREATED="1556946811127" MODIFIED="1556946820600"/>
<node TEXT="ordre d&apos;achat" ID="ID_1445092376" CREATED="1556946828693" MODIFIED="1556946838440"/>
</node>
</node>
<node TEXT="Mines" POSITION="right" ID="ID_1976360916" CREATED="1556939086129" MODIFIED="1556939094132">
<edge COLOR="#7c0000"/>
<node TEXT="mine existante" ID="ID_1475073433" CREATED="1556946934577" MODIFIED="1556947010664"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="5">production max &gt; 0</font>
    </p>
  </body>
</html>

</richcontent>
<node TEXT="ligne d&apos;une mine" ID="ID_1309740583" CREATED="1556946588447" MODIFIED="1556946598797"/>
<node TEXT="rapport d&#xe9;taill&#xe9;" ID="ID_263500886" CREATED="1556946600322" MODIFIED="1556946608667"/>
<node TEXT="lien vers le stock du minerai" ID="ID_724043177" CREATED="1556947061004" MODIFIED="1556947078137"/>
</node>
<node TEXT="construire une mine" ID="ID_1937863317" CREATED="1556946962561" MODIFIED="1556946997796"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="5">production max = 0</font>
    </p>
  </body>
</html>

</richcontent>
</node>
</node>
<node TEXT="B&#xe2;timent sp&#xe9;ciaux" POSITION="right" ID="ID_1471153631" CREATED="1556939094965" MODIFIED="1556939103427">
<edge COLOR="#00007c"/>
<node TEXT="b&#xe2;timent existant" ID="ID_255117686" CREATED="1556947279815" MODIFIED="1556947322410"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="5">niveau &gt; 0</font>
    </p>
  </body>
</html>

</richcontent>
</node>
<node TEXT="b&#xe2;timent inexistant" ID="ID_1955953511" CREATED="1556947279815" MODIFIED="1556947333496"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="5">niveau = 0</font>
    </p>
  </body>
</html>

</richcontent>
</node>
</node>
<node TEXT="Quartier g&#xe9;n&#xe9;ral" POSITION="right" ID="ID_1227828820" CREATED="1556939116781" MODIFIED="1556939126176">
<edge COLOR="#007c00"/>
<node TEXT="niveau" ID="ID_669726459" CREATED="1556947347580" MODIFIED="1556947351652"/>
<node TEXT="listes des mat&#xe9;riaux &#xe0; investir" ID="ID_151848496" CREATED="1556947352711" MODIFIED="1556947365507"/>
</node>
<node TEXT="Missions pour r&#xe9;cup&#xe9;rer..." POSITION="right" ID="ID_663750520" CREATED="1556939137539" MODIFIED="1556942777735">
<edge COLOR="#7c007c"/>
<richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      pr&#233;senter les mission du point de vue des stock
    </p>
  </body>
</html>

</richcontent>
<node TEXT="produits" ID="ID_1699028417" CREATED="1556939643898" MODIFIED="1556939649951">
<node TEXT="produit &#xe0; vendre" ID="ID_522716623" CREATED="1556947404566" MODIFIED="1556948147954"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="5">ilpeut y avoir aucun produit</font>
    </p>
  </body>
</html>

</richcontent>
</node>
<node TEXT="r&#xe9;compense" ID="ID_1802544128" CREATED="1556947411988" MODIFIED="1556947422473"/>
<node TEXT="description" ID="ID_1732812269" CREATED="1556947422850" MODIFIED="1556947427144"/>
</node>
<node TEXT="argent" ID="ID_1198052209" CREATED="1556939651459" MODIFIED="1556947649515"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="5">L'argent est un produit particulier. Il intervient dans la production l'am&#233;lioration et il est stock&#233; dans un compte (au lieu d'u entrep&#244;t)</font>
    </p>
  </body>
</html>

</richcontent>
</node>
<node TEXT="caisses" ID="ID_240662102" CREATED="1556939655188" MODIFIED="1556939667494"/>
</node>
<node TEXT="page d&apos;accueil" POSITION="left" ID="ID_24291204" CREATED="1556938816454" MODIFIED="1556938822164">
<edge COLOR="#00ff00"/>
<node TEXT="pr&#xe9;sentation" ID="ID_178092924" CREATED="1556938836370" MODIFIED="1556938844560"/>
<node TEXT="cr&#xe9;ation de compte" ID="ID_923956847" CREATED="1556938845642" MODIFIED="1556938857135"/>
<node TEXT="se connecter" ID="ID_538910503" CREATED="1556938857663" MODIFIED="1556938961344"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      avoir un compte pemet de conserver les donn&#233;es
    </p>
  </body>
</html>

</richcontent>
</node>
</node>
<node TEXT="situation initiale" POSITION="left" ID="ID_153289809" CREATED="1556938710847" MODIFIED="1556939927258">
<edge COLOR="#ff0000"/>
<richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      ici sont r&#233;pertori&#233;e toutes les donn&#233;es du joueur
    </p>
  </body>
</html>

</richcontent>
<node TEXT="&#xe0; l&apos;aide de formulaires" ID="ID_1291391205" CREATED="1556938984844" MODIFIED="1556941682839">
<node TEXT="donn&#xe9;es &#xe0; variation lente" ID="ID_1548696172" CREATED="1556940431861" MODIFIED="1556940443728">
<node TEXT="niveau des entrep&#xf4;ts" ID="ID_652409921" CREATED="1556940520788" MODIFIED="1556940589924"/>
<node TEXT="niveau entreprise" ID="ID_1301134624" CREATED="1556940488088" MODIFIED="1556940517833"/>
<node TEXT="pour les mines" ID="ID_1879595227" CREATED="1556940949019" MODIFIED="1556940982913">
<node TEXT="capacit&#xe9; de production maximale pour un produit minier" ID="ID_1840479785" CREATED="1556940844344" MODIFIED="1556941008631" HGAP_QUANTITY="16.999999910593036 pt" VSHIFT_QUANTITY="-8.249999754130847 pt"/>
<node TEXT="condition de production" ID="ID_188190395" CREATED="1556940937160" MODIFIED="1556941062156"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="4">la diminution est indiqu&#233;e dans EVA</font>
    </p>
  </body>
</html>

</richcontent>
</node>
</node>
<node TEXT="QG" ID="ID_1745483151" CREATED="1556941483876" MODIFIED="1556941490500">
<node TEXT="niveau" ID="ID_1582504616" CREATED="1556941089532" MODIFIED="1556941499844"/>
<node TEXT="produits investies dans le QG" ID="ID_1622049072" CREATED="1556941500390" MODIFIED="1556941527450"/>
</node>
</node>
<node TEXT="donn&#xe9;es &#xe0; variation rapide" ID="ID_15788543" CREATED="1556940446660" MODIFIED="1556940803470"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      <font size="4">De seconde en seconde la valeur change. Il faut donc tenir compte de l'instant ou est entr&#233;e une donn&#233;e.</font>
    </p>
  </body>
</html>

</richcontent>
<node TEXT="quantit&#xe9; stock&#xe9;e" ID="ID_733702393" CREATED="1556940807105" MODIFIED="1556940821977"/>
<node TEXT="dur&#xe9;e restante de production d&apos;une usine" ID="ID_114104678" CREATED="1556940824448" MODIFIED="1556940874771"/>
</node>
</node>
<node TEXT="&#xe0; l&apos;aide d&apos;un fichier" ID="ID_357228172" CREATED="1556938997153" MODIFIED="1556940419471"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      le site offre lapossibilit&#233; d'avoir une fichier CSV avec les donn&#233;s du joueur
    </p>
  </body>
</html>

</richcontent>
</node>
</node>
</node>
</map>
