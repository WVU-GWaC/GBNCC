<title>GBNCC Discoveries</title>

<?php


parse_str($_SERVER['QUERY_STRING']);
if(!isset($sort))
  $sort=1;
if (is_numeric($sort) != 1)
  exit;
$discoveries820 = array();
$temp820 = file('gbt820_discoveries.txt',FILE_IGNORE_NEW_LINES);
$cmd820 = "sort -k $sort";
if($sort==1||$sort==4||$sort==5)
  $cmd820 = $cmd820 . " -n";
if($order==0)
  $cmd820 = $cmd820 . " -r";
$cmd820 = $cmd820 . " gbt820_discoveries.txt";
exec($cmd820);
if(!isset($order))
  $order=1;
if (is_numeric($order) != 1)
  exit;
else if ($order==0)
  $order=1;
else
  $order=0;
$num820=count($temp820);
$msps820=0;
$temparray820=array();
for($i=0;$i<$num820;++$i)
{ 
  $temparray820=explode(" ",$temp820[$i]);
  if((float)($temparray820[3])<20.0)
    $msps820++;
  array_push($discoveries820,$temparray820);
}
echo "<font size=\"4\">\n\n\n";
echo "<table border='1' align='right'>\n";
echo "<tr align='center'><td><a href='http://astro.phys.wvu.edu/GBNCC/index.php?sort=1&order=$order'>#</a></td><td><a href='http://astro.phys.wvu.edu/GBNCC/index.php?sort=3&order=$order'>GBT820 Discovery</a></td><td><a href='http://astro.phys.wvu.edu/GBNCC/index.php?sort=4&order=$order'>P(ms)</td></a><td><a href='http://astro.phys.wvu.edu/GBNCC/index.php?sort=5&order=$order'>DM</a></td><td><a href='http://astro.phys.wvu.edu/GBNCC/index.php?sort=6&order=$order'>Single Pulse</a></td><td><a href='http://astro.phys.wvu.edu/GBNCC/index.php?sort=7&order=$order'>Discovered by:</a></td></tr>\n";
for($i=0;$i<$num820;++$i)
{ 
  $id820 = $discoveries820[$i][0];
  $fftname820 = $discoveries820[$i][1];
  $name820 = $discoveries820[$i][2];
  $period820 = $discoveries820[$i][3];
  $dm820 = $discoveries820[$i][4];
  $spname820 = $discoveries820[$i][5];
  $disc820 = $discoveries820[$i][6];
  if($spname820=="None" && $fftname820!="None") {
    echo "<tr><td>$id820</td><td><a href='$fftname820'>$name820</a></td><td>$period820</td><td>$dm820</td><td>$spname820</td><td>$disc820</td></tr>\n";
  } elseif($spname820!="None" && $fftname820=="None") {
    echo "<tr><td>$id820</td><td>$name820</td><td>$period820</td><td>$dm820</td><td><a href='$spname820'>$name820</a></td><td>$disc820</td></tr>\n";
  } elseif($spname820=="None" && $fftname820=="None") {
    echo "<tr><td>$id820</td><td>$name820</td><td>$period820</td><td>$dm820</td><td>$spname820</td><td>$disc820</td></tr>\n";
  } else {
    echo "<tr><td>$id820</td><td><a href='$fftname820'>$name820</a></td><td>$period820</td><td>$dm820</td><td><a href='$spname820'>$name820</a></td><td>$disc820</td></tr>\n";
  }
}
echo "</table>\n";
$numrrats=24;


parse_str($_SERVER['QUERY_STRING']);
if(!isset($sort))
  $sort=1;
if (is_numeric($sort) != 1)
  exit;
$discoveries = array();

//$temp = file('gbncc_discoveries.txt',FILE_IGNORE_NEW_LINES);
$cmd = "sort -k $sort";
if($sort==1||$sort==4||$sort==5)
  $cmd = $cmd . " -n";
if($order==0)
  $cmd = $cmd . " -r";
$cmd = $cmd . " gbncc_discoveries.txt";
exec($cmd,$temp);
if(!isset($order))
  $order=1;
if (is_numeric($order) != 1)
  exit;
else if ($order==0)
  $order=1;
else
  $order=0;
$num=count($temp);
$msps=0;
$temparray=array();
for($i=0;$i<$num;++$i)
{
  $temparray=explode(" ",$temp[$i]);
  if((float)($temparray[3])<20.0)
    $msps++;
  array_push($discoveries,$temparray);
}
echo "<center><h2>GBNCC Discoveries (" . ($num) . " total, $msps MSPs, $numrrats RRATs)</h2></center>\n";
echo "<font size=\"4\">\n";
echo "<table border='1' align='right'>\n";
echo "<tr align='center'><td><a href='http://astro.phys.wvu.edu/GBNCC/index.php?sort=1&order=$order'>#</a></td><td><a href='http://astro.phys.wvu.edu/GBNCC/index.php?sort=3&order=$order'>GBNCC Discovery</a></td><td><a href='http://astro.phys.wvu.edu/GBNCC/index.php?sort=4&order=$order'>P(ms)</td></a><td><a href='http://astro.phys.wvu.edu/GBNCC/index.php?sort=5&order=$order'>DM</a></td><td><a href='http://astro.phys.wvu.edu/GBNCC/index.php?sort=6&order=$order'>Single Pulse</a></td><td><a href='http://astro.phys.wvu.edu/GBNCC/index.php?sort=7&order=$order'>Discovered by:</a></td></tr>\n";
for($i=0;$i<$num;++$i)
{
  $id = $discoveries[$i][0];
  $fftname = $discoveries[$i][1];
  $name = $discoveries[$i][2];
  $period = $discoveries[$i][3];
  $dm = $discoveries[$i][4];
  $spname = $discoveries[$i][5];
  $disc = $discoveries[$i][6];
  if($spname=="None" && $fftname!="None") {
    echo "<tr><td>$id</td><td><a href='$fftname'>$name</a></td><td>$period</td><td>$dm</td><td>$spname</td><td>$disc</td></tr>\n";
  } elseif($spname!="None" && $fftname=="None") {
    echo "<tr><td>$id</td><td>$name</td><td>$period</td><td>$dm</td><td><a href='$spname'>$name</a></td><td>$disc</td></tr>\n";
  } elseif($spname=="None" && $fftname=="None") {
    echo "<tr><td>$id</td><td>$name</td><td>$period</td><td>$dm</td><td>$spname</td><td>$disc</td></tr>\n";
  } else {
    echo "<tr><td>$id</td><td><a href='$fftname'>$name</a></td><td>$period</td><td>$dm</td><td><a href='$spname'>$name</a></td><td>$disc</td></tr>\n";
  }
}
echo "</table>\n";


echo "<p>
The Green Bank North Celestial Cap (GBNCC) pulsar survey is a 350MHz all-sky pulsar survey using
the Robert C. Byrd Green Bank Telescope in West Virginia. When complete, the survey will cover the entire 
sky north of -40&deg;. Data taking began in 2009 and is expected to be completed in 2021.
Processing of the GBNCC data began in 2011. Data are processed on the Béluga (previously Guillimin) 
high-performance computer operated by McGill University, <a href=https://www.computecanada.ca>Compute Canada</a>,
and <a href=https://www.calculquebec.ca/en>Calcul Québec</a>.
<p>
To date, we have found " . ($num) . " new pulsars with $msps of them being MSPs and $numrrats being new RRATs. Below are
sky plots showing our discovered pulsars and the current sky coverage of the survey. Large circles indicate discovered MSPs, small circles are discovered normal pulsars, and triangles mark new RRATs. The list of newly discovered pulsars are shown to the right and the newly discovered RRATs are listed <a href=http://www.physics.mcgill.ca/~chawlap/GBNCC_RRATs.html>here</a>.\n";
?>

<p>
The collaboration includes members from 
<a href=http://www.mcgill.ca>McGill University</a>, 
<a href=http://www.nrao.edu>National Radio Astronomy Observatory</a>, 
<a href=http://www.uva.nl/start/cfm>Universiteit van Amsterdam</a>,
<a href=http://www.astron.nl>ASTRON</a>,
<a href=https://nyuad.nyu.edu/en/>New York University Abu Dhabi</a>,
<a href=http://www.ubc.ca>University of British Columbia</a>, 
<a href=http://www.uwm.edu>University of Wisconsin - Milwaukee</a>,
<a href=http://www.virginia.edu>University of Virginia</a>, 
<a href=http://www.utb.edu>University of Texas at Brownsville</a>, 
<a href=http://www.wvu.edu>West Virginia University</a>,
and <a href=https://www.kenyon.edu>Kenyon College</a>.

<p>
Another pulsar survey using the Green Bank Telescope is the 820MHz Cygnus Survey, which began in 2016. This survey covers a region of the sky from 75&deg; &leq; l &leq; 94&deg; and -3&deg; &leq; b &leq; 6 &deg;, which is expected to contain many (~60) new pulsars. Data processing is conducted on the Béluga HPC alongside GBNCC data (see above). This survey has found several candidates, which are listed in the second table on this page. 


<p>
<h3>Publications:</h3>
<b><a href='https://ui.adsabs.harvard.edu/abs/2021arXiv210210214A'>The Green Bank Northern Celestial Cap Pulsar Survey. VI. Timing and Discovery of PSR J1759+5036: A Double Neutron Star Binary Pulsar</b></a><br>
Agazie,&nbsp;G.; Mingyar,&nbsp;M.; McLaughlin,&nbsp;M.; Swiggum,&nbsp;J.; Kaplan,&nbsp;D.; Blumer,&nbsp;H.; Chawla,&nbsp;P.; DeCesar,&nbsp;M.; Demorest,&nbsp;P. Fiore,&nbsp;W.; Fonseca,&nbsp;E.; Gelfand,&nbsp;J.; Kaspi,&nbsp;V.; Kondratiev,&nbsp;V.; LaRose,&nbsp;M.; van Leeuwen,&nbsp;J.; Levin,&nbsp;L.; Lewis,&nbsp;E.; Lynch,&nbsp;R.; McEwen,&nbsp;A.; Al Noori,&nbsp;H.; Parent,&nbsp;E.; Ransom,&nbsp;S.; Roberts,&nbsp;M.; Schmiedekamp,&nbsp;A.; Schmiedekamp,&nbsp;C.; Siemens,&nbsp;X.; Spiewak,&nbsp;R.; Stairs,&nbsp;I.; Surnis,&nbsp;M.<br>
The Astrophysical Journal - Accepted for publication <a href='https://arxiv.org/abs/2102.10214'>eprint arXiv Link</a><br><br>

<b><a href='https://iopscience.iop.org/article/10.3847/1538-4357/abbdf6'>First Discovery of a Fast Radio Burst at 350 MHz by the GBNCC Survey</b></a><br>
Parent,&nbsp;E.; Chawla,&nbsp;P.; Kaspi,&nbsp;V.M.; Agazie,&nbsp;G.Y.; Blumer,&nbsp;H.; DeCesar,&nbsp;M.; Fiore,&nbsp;W.; Fonseca,&nbsp;E.; Hessels,&nbsp;J.W.T.; Kaplan,&nbsp;D.L.; Kondratiev,&nbsp;V.I.; LaRose,&nbsp;M.; Levin,&nbsp;L.; Lewis,&nbsp;E.F.; Lynch,&nbsp;R.S.; McEwen,&nbsp;A.E.; McLaughlin,&nbsp;M.A.; Mingyar,&nbsp;M.; AlNoori,&nbsp;H.; Ransom,&nbsp;S.M.; Roberts,&nbsp;M.S.E.; Schmiedekamp,&nbsp;A.; Schmiedekamp,&nbsp;C.; Siemens,&nbsp;X.; Spiewak,&nbsp;R.; Stairs,&nbsp;I.H.; Surnis,&nbsp;M.; Swiggum,&nbsp;J.; vanLeeuwen,&nbsp;J.
The Astrophysical Journal, Volume 904, Issue 2, article id. 92 (2020) <a href='https://ui.adsabs.harvard.edu/abs/2020ApJ...904...92P/abstract'>ADS Link</a><br><br>

<b><a href='https://iopscience.iop.org/article/10.3847/1538-4357/ab75e2'>The Green Bank North Celestial Cap Pulsar Survey V: Pulsar Census and Survey Sensitivity</b></a><br>
McEwen,&nbsp;A.&nbsp;E.; Spiewak,&nbsp;R.; Swiggum,&nbsp;J.&nbsp;K.; Kaplan,&nbsp;D.&nbsp;L.;Fiore,&nbsp;W.; Agazie,&nbsp;G.&nbsp;Y.; Blumer,&nbsp;H.; Chawla,&nbsp;P.; DeCesar,&nbsp;M.&nbsp;E.; Kaspi,&nbsp;V.&nbsp;M.; Kondratiev,&nbsp;V.&nbsp;I.; LaRose,&nbsp;M.; Levin,&nbsp;L.; Lynch,&nbsp;R.&nbsp;S.; McLaughlin,&nbsp;M.&nbsp;A.; Mingyar,&nbsp;M.; Al Noori,&nbsp;H.; Ransom,&nbsp;S.&nbsp;M.; Roberts,&nbsp;M.&nbsp;S.&nbsp;E.;  Schmiedekamp,&nbsp;A.; Schmiedekamp,&nbsp;C.; Siemens,&nbsp;X.; Stairs,&nbsp;I.&nbsp;H.; Stovall,&nbsp;K.; Surnis,&nbsp;M.; van Leeuwen,&nbsp;J.<br>
The Astrophysical Journal, Volume 892, Issue 2, article id. 76 (2020) <a href='https://ui.adsabs.harvard.edu/abs/2020ApJ...892...76M'>ADS Link</a><br><br>

<b><a href='https://iopscience.iop.org/article/10.3847/1538-4357/ab0d21/meta'>The Green Bank North Celestial Cap Pulsar Survey IV: Four New Timing Solutions</b></a><br>
Aloisi,&nbsp;R.&nbsp;J.; Cruz,&nbsp;A.; Daniels,&nbsp;L.; Meyers,&nbsp;N.; Roekle,&nbsp;R.; Schuett,&nbsp;A.; Swiggum,&nbsp;J.&nbsp;K.; DeCesar,&nbsp;M.&nbsp;E.; Kaplan,&nbsp;D.&nbsp;L.; Lynch,&nbsp;R.&nbsp;S.; Stovall,&nbsp;K.; Levin,&nbsp;L.; Archibald,&nbsp;A.&nbsp;M.; Banaszak,&nbsp;S.; Biwer,&nbsp;C.&nbsp;M.; Boyles,&nbsp;J.; Chawla,&nbsp;P.; Dartez,&nbsp;L.&nbsp;P.; Cui,&nbsp;B.; Day,&nbsp;D.&nbsp;F.; Ford,&nbsp;A.&nbsp;J.; Flanigan,&nbsp;J.; Fonseca,&nbsp;E.; Hessels,&nbsp;J.&nbsp;W.&nbsp;T.; Hinojosa,&nbsp;J.; Karako-Argaman,&nbsp;C.; Kaspi,&nbsp;V.&nbsp;M.; Kondratiev,&nbsp;V.&nbsp;I.; Leake,&nbsp;S.; Lunsford,&nbsp;G.; Martinez,&nbsp;J.&nbsp;G.; Mata,&nbsp;A.; McLaughlin,&nbsp;M.&nbsp;A.; Al Noori,&nbsp;H.; Ransom,&nbsp;S.&nbsp;M.; Roberts,&nbsp;M.&nbsp;S.&nbsp;E.; Rohr,&nbsp;M.&nbsp;D.; Siemens,&nbsp;X.; Spiewak,&nbsp;R.; Stairs,&nbsp;I.&nbsp;H.; van Leeuwen,&nbsp;J.; Walker,&nbsp;A.&nbsp;N.; Wells,&nbsp;B.&nbsp;L.<br>
The Astrophysical Journal, Volume 875, Issue 1, article id. 19 (2019) <a href='https://ui.adsabs.harvard.edu/abs/2019ApJ...875...19A'>ADS Link</a><br><br>

<b><a href='http://iopscience.iop.org/article/10.3847/1538-4357/aabf8a/meta'>The Green Bank North Celestial Cap Pulsar Survey III: 45 New Pulsar Timing Solutions</b></a><br>
Lynch,&nbsp;R.&nbsp;S.; Swiggum, J.&nbsp;K.; Kondratiev,&nbsp;V.&nbsp;I.; Kaplan,&nbsp;D.&nbsp;L.; Stovall,&nbsp;K.; Fonseca,&nbsp;E.; Roberts,&nbsp;M.&nbsp;S.&nbsp;E.; Levin,&nbsp;L.; DeCesar,&nbsp;M.&nbsp;E.; Cui,&nbsp;B.; Cenko,&nbsp;S.&nbsp;B.; Gatkine,&nbsp;P.; Archibald,&nbsp;A.&nbsp;M.; Banaszak,&nbsp;S.; Biwer,&nbsp;C.&nbsp;M.; Boyles,&nbsp;J.; Chawla,&nbsp;P.; Dartez,&nbsp;L.&nbsp;P.; Day,&nbsp;D.; Ford,&nbsp;A.&nbsp;J.; Flanigan,&nbsp;J.; Hessels,&nbsp;J.&nbsp;W.&nbsp;T.; Hinojosa,&nbsp;J.; Jenet,&nbsp;F.&nbsp;A.; Karako-Argaman,&nbsp;C.; Kaspi,&nbsp;V.&nbsp;M.; Leake,&nbsp;S.; Lunsford,&nbsp;G.; Martinez,&nbsp;J.&nbsp;G.; Mata,&nbsp;A.; McLaughlin,&nbsp;M.&nbsp;A.; Al&nbsp;Noori,&nbsp;H.; Ransom,&nbsp;S.&nbsp;M.; Rohr,&nbsp;M.&nbsp;D.; Siemens,&nbsp;X.; Spiewak,&nbsp;R.; Stairs,&nbsp;I.&nbsp;H.; van&nbsp;Leeuwen,&nbsp;J.; Walker,&nbsp;A.&nbsp;N.; Wells,&nbsp;B.&nbsp;L.<br>
The Astrophysical Journal, Volume 859, Issue 2, article id. 93 (2018) <a href='http://adsabs.harvard.edu/abs/2018ApJ...859...93L'>ADS Link</a><br><br>

<b><a href='http://iopscience.iop.org/article/10.3847/1538-4357/aab61d/meta'>The Green Bank Northern Celestial Cap Pulsar Survey II: The Discovery and Timing of Ten Pulsars</b></a><br>
Kawash,&nbsp;A.&nbsp;M.; McLaughlin,&nbsp;M.&nbsp;A.; Kaplan,&nbsp;D.&nbsp;L.; DeCesar,&nbsp;M.&nbsp;E.; Levin,&nbsp;L.; Lorimer,&nbsp;D.&nbsp;R.; Lynch,&nbsp;R.&nbsp;S.; Stovall,&nbsp;K.; Swiggum,&nbsp;J.&nbsp;K.; Fonseca,&nbsp;E.; Archibald,&nbsp;A.&nbsp;M.; Banaszak,&nbsp;S.; Biwer,&nbsp;C.&nbsp;M.; Boyles,&nbsp;J.; Cui,&nbsp;B.; Dartez,&nbsp;L.&nbsp;P.; Day,&nbsp;D.; Ernst,&nbsp;S.; Ford,&nbsp;A.&nbsp;J.; Flanigan,&nbsp;J.; Heatherly,&nbsp;S.&nbsp;A.; Hessels,&nbsp;J.&nbsp;W.&nbsp;T.; Hinojosa,&nbsp;J.; Jenet,&nbsp;F.&nbsp;A.; Karako-Argaman,&nbsp;C.; Kaspi,&nbsp;V.&nbsp;M.; Kondratiev,&nbsp;V.&nbsp;I.; Leake,&nbsp;S.; Lunsford,&nbsp;G.; Martinez,&nbsp;J.&nbsp;G.; Mata,&nbsp;A.; Matheny,&nbsp;T.&nbsp;D.; Mcewen,&nbsp;A.&nbsp;E.; Mingyar,&nbsp;M.&nbsp;G.; Orsini,&nbsp;A.&nbsp;L.; Ransom,&nbsp;S.&nbsp;M.; Roberts,&nbsp;M.&nbsp;S.&nbsp;E.; Rohr,&nbsp;M.&nbsp;D.; Siemens,&nbsp;X.; Spiewak,&nbsp;R.; Stairs,&nbsp;I.&nbsp;H.; van&nbsp;Leeuwen,&nbsp;J.; Walker,&nbsp;A.&nbsp;N.; Wells,&nbsp;B.&nbsp;L.<br>
The Astrophysical Journal, Volume 857, Issue 2, article id. 131 (2018) <a href='http://adsabs.harvard.edu/abs/2018ApJ...857..131K'>ADS Link</a><br><br>

<b><a href='http://iopscience.iop.org/article/10.3847/1538-4357/aa7d57/meta'>A Search for Fast Radio Bursts with the GBNCC Pulsar Survey</b></a><br>
Chawla,&nbsp;P.; Kaspi,&nbsp;V.&nbsp;M.; Josephy,&nbsp;A.; Rajwade,&nbsp;K.&nbsp;M.; Lorimer,&nbsp;D.&nbsp;R.; Archibald,&nbsp;A.&nbsp;M.; DeCesar,&nbsp;M.&nbsp;E.;Hessels,&nbsp;J.&nbsp;W.&nbsp;T.; Kaplan,&nbsp;D.&nbsp;L.; Karako-Argaman,&nbsp;C.; Kondratiev,&nbsp;V.&nbsp;I.; Levin,&nbsp;L.; Lynch,&nbsp;R.&nbsp;S.; McLaughlin,&nbsp;M.&nbsp;A.; Ransom,&nbsp;S.&nbsp;M.; Roberts,&nbsp;M.&nbsp;S.&nbsp;E.; Stairs,&nbsp;I.&nbsp;H.; Stovall,&nbsp;K.; Swiggum,&nbsp;J.&nbsp;K.; van&nbsp;Leeuwen,&nbsp;J.<br>
The Astrophysical Journal, Volume 844, Issue 21, article id. 140 (2017) <a href='http://adsabs.harvard.edu/abs/2017ApJ...844..140C'> ADS Link</a><br><br>
<b><a href='http://iopscience.iop.org/article/10.1088/0004-637X/809/1/67/'>Discovery and Follow-up of Rotating Radio Transients with the Green Bank and LOFAR Telescopes</b></a><br>
Karako-Argaman,&nbsp;C.; Kaspi,&nbsp;V.&nbsp;M.; Lynch,&nbsp;R.&nbsp;S.; Hessels,&nbsp;J.&nbsp;W.&nbsp;T.; Kondratiev,&nbsp;V.&nbsp;I.; McLaughlin,&nbsp;M.&nbsp;A.; Ransom,&nbsp;S.&nbsp;M.; Archibald,&nbsp;A.&nbsp;M.; Boyles,&nbsp;J.; Jenet,&nbsp;F.&nbsp;A.; Kaplan,&nbsp;D.&nbsp;L.; Levin,&nbsp;L.; Lorimer,&nbsp;D.&nbsp;R.; Madsen,&nbsp;E.&nbsp;C.; Roberts,&nbsp;M.&nbsp;S.&nbsp;E.; Siemens,&nbsp;X.; Stairs,&nbsp;I.&nbsp;H.; Stovall,&nbsp;K.; Swiggum,&nbsp;J.&nbsp;K.; van&nbsp;Leeuwen,&nbsp;J.<br>
The Astrophysical Journal, Volume 809, Issue 1, article id. 67 (2015) <a href='http://adsabs.harvard.edu/abs/2015ApJ...809...67K'> ADS Link</a><br><br>
<b><a href='http://iopscience.iop.org/article/10.1088/0004-637X/791/1/67/'>The Green Bank Northern Celestial Cap Pulsar Survey - I: Survey Description, Data Analysis, and Initial Results</b></a><br>
Stovall,&nbsp;K.; Lynch,&nbsp;R.&nbsp;S.; Ransom,&nbsp;S.&nbsp;M.; Archibald,&nbsp;A.&nbsp;M.; Banaszak,&nbsp;S.; Biwer,&nbsp;C.&nbsp;M.; Boyles,&nbsp;J.; Dartez,&nbsp;L.&nbsp;P.; Day,&nbsp;D.; Ford,&nbsp;A.&nbsp;J.; Flanigan,&nbsp;J.; Garcia,&nbsp;A.; Hessels,&nbsp;J.&nbsp;W.&nbsp;T.; Hinojosa,&nbsp;J.; Jenet,&nbsp;F.&nbsp;A.; Kaplan,&nbsp;D.&nbsp;L.; Karako-Argaman,&nbsp;C.; Kaspi,&nbsp;V.&nbsp;M.; Kondratiev,&nbsp;V.&nbsp;I.; Leake,&nbsp;S.; Lorimer,&nbsp;D.&nbsp;R.; Lunsford,&nbsp;G.; Martinez,&nbsp;J.&nbsp;G.; Mata,&nbsp;A.; McLaughlin,&nbsp;M.&nbsp;A.; Roberts,&nbsp;M.&nbsp;S.&nbsp;E.; Rohr,&nbsp;M.&nbsp;D.; Siemens,&nbsp;X.; Stairs,&nbsp;I.&nbsp;H.; van&nbsp;Leeuwen,&nbsp;J.; Walker,&nbsp;A.&nbsp;N.; Wells,&nbsp;B.&nbsp;L.<br>
The Astrophysical Journal, Volume 791, Issue 1, article id. 67 (2014) <a href='http://adsabs.harvard.edu/abs/2014ApJ...791...67S'> ADS Link</a><br><br>
<b><a href='http://iopscience.iop.org/0004-637X/753/2/174/'>Discovery of the Optical/Ultraviolet/Gamma-Ray Counterpart to the Eclipsing Millisecond Pulsar J1816+4510</b></a><br>
Kaplan,&nbsp;D.&nbsp;L.; Stovall,&nbsp;K.; Ransom,&nbsp;S.&nbsp;M.; Roberts,&nbsp;M.&nbsp;S.&nbsp;E.; Kotulla,&nbsp;R.; Archibald,&nbsp;A.&nbsp;M.; Biwer,&nbsp;C.&nbsp;M.; Boyles,&nbsp;J.; Dartez,&nbsp;L.; Day,&nbsp;D.&nbsp;F.; Ford,&nbsp;A.&nbsp;J.; Garcia,&nbsp;A.; Hessels,&nbsp;J.&nbsp;W.&nbsp;T.; Jenet,&nbsp;F.&nbsp;A.; Karako,&nbsp;C.; Kaspi,&nbsp;V.&nbsp;M.; Kondratiev,&nbsp;V.&nbsp;I.; Lorimer,&nbsp;D.&nbsp;R.; Lynch,&nbsp;R.&nbsp;S.; McLaughlin,&nbsp;M.&nbsp;A.; Rohr,&nbsp;M.&nbsp;D.&nbsp;W.; Siemens,&nbsp;X.; Stairs,&nbsp;I.&nbsp;H.; van&nbsp;Leeuwen,&nbsp;J.<br>
The Astrophysical Journal, Volume 753, Issue 2, article id. 174 (2012) <a href='http://adsabs.harvard.edu/abs/2012ApJ...753..174K'>ADS Link</a><br>
<br><br>
<img width="640" src="gbncc_skymap_radec_062821.png">

<img width="640" src="gbncc_skymap_glgb_062821.png">
<?php
echo "<br>\n";
echo "Page last modified: " . date ("F d Y H:i:s.", getlastmod()) . "\n<br>";
echo "Pulsar list last modified: " . date ("F d Y H:i:s.", filemtime("gbncc_discoveries.txt")) . "\n<br>";
echo "Plots last updated: " . date ("F d Y H:i:s.", filemtime("gbncc_skymap_radec_062821.png"));
?>
</font>
</html>
