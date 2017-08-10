<?
// This is a template for a PHP scraper on morph.io (https://morph.io)
// including some code snippets below that you should find helpful
// require 'scraperwiki.php';
// require 'scraperwiki/simple_html_dom.php';
//
// // Read in a page
// $html = scraperwiki::scrape("http://foo.com");
//
// // Find something on the page using css selectors
// $dom = new simple_html_dom();
// $dom->load($html);
// print_r($dom->find("table.list"));
//
// // Write out to the sqlite database using scraperwiki library
// scraperwiki::save_sqlite(array('name'), array('name' => 'susan', 'occupation' => 'software developer'));
//
// // An arbitrary query against the database
// scraperwiki::select("* from data where 'name'='peter'")
// You don't have to do things with the ScraperWiki library.
// You can use whatever libraries you want: https://morph.io/documentation/php
// All that matters is that your final data is written to an SQLite database
// called "data.sqlite" in the current working directory which has at least a table
// called "data".3
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
$Alpha	=	array('IDA','IDB','IDC','IDD','IDE','IDF','IDG','IDH','IDJ','IDK','IDL','IDM','IDN','IDP','IDS','IDT','aaa','aab','aac','aad','aae','aaf','aag','aah','aai','aaj','aak','aal','aam','aan','aap','aaq','aar','aas','aat','aau','aav','aaw','aax','aay','aaz','aba','aca','ada','aea','afa','aga','aha','aia','aja','aka','ala','ama','AA','AB','AC','AD','AE','AF','AG','AH','AI','Aj','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','CA','DA','EA','FA','GA','HA','IA','JA','KA','LA','MA','NA','PA','QA','RA','SA','TA','UA','VA','WA','YA','ZA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CB','CE','CF','CG','CH','CJ','CL','CM','CN','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DB','DD','DF','DG','DH','DK','DL','DM','DN','DP','DQ','DR','DS','DT','DU','DV','DX','EB','EH','EK','EL','EM','EN','EP','EQ','ER','ES','EU','EV','EW','EX','EY','EZ','Fb','FD','FE','FG','FH','FJ','FK','FM','FN','FP','FQ','FR','FT','FU','FV','FW','FX','FY','HB','HC','HD','HE','HF','HG','HH','HJ','HK','HL','HM','HN','HP','HQ','HR','HS','HT','HU','HV','HW','HX','HY','HZ','JB','JC','JD','JE','JF','JG','JK','JL','JM','JN','JP','JQ','JR','JS','JT','JU','JV','JW','JX','JY','JZ','KB','KC','KD','KE','KF','KG','KH','KI','KJ','KK','KL','KM','KN','Kp','KQ','KR','KS','KT','KU','KV','KW','KX','KY','KZ','LB','LC','LD','LE','LF','LG','LH','LJ','LK','LL','LM','LN','LP','LQ','LR','LS','LT','LU','LV','LW','LX','LY','LZ','MB','MC','MD','ME','MF','MG','MH','MI','MJ','MK','ML','MM','MN','MP','MQ','MR','MS','MT','MU','MV','MW','MX','MY','MZ','NB','NC','ND','NE','NF','NG','NH','NJ','NK','NM','NN','NO','NP','NQ','NR','NS','NT','NU','NV','NW','NX','NY','NZ','PB','PC','PD','PE','PF','PG','PH','PJ','PK','PL','PM','PN','PP','PQ','PR','PS','PT','PU','PV','PW','PX','PY','PZ','QB','QC','QD','QE','QF','QG','QH','QI','QJ','QK','QQ','QR','QS','QT','QU','QV','QW','QX','QY','QZ','RB','RC','RD','RE','RF','RG','RH','RI','RJ','RK','RL','RM','RN','RO','RP','RQ','RS','RT','RU','RV','RY','RZ','SB','SC','SE','SF','SG','SH','SJ','SK','SL','SM','SN','SP','SQ','SR','SS','ST','Su','SV','SW','SX','SY','SZ','TB','TC','TD','TE','TF','TG','TH','TJ','TK','TL','TM','TN','TP','TQ','TR','TS','TU','TV','TW','UB','UC','UD','UE','UF','UG','UH','UJ','UL','UM','UN','UQ','UR','UT','UU','UW','UX','UY','UZ','VB','VC','VD','VE','VF','VG','VH','VI','VJ','VK','VL','VM','VN','VO','VP','VQ','VR','VS','VT','VU','VW','VX','VY','VZ','WB','WC','WD','WE','WF','WG','WH','WJ','WK','WL','WM','WN','WQ','WS','WT','WU','WX','WY','WZ','ZB','ZC','ZD','ZE','ZF','ZG','ZH','Zj','ZK','ZL','ZM','ZN','ZP','ZQ','ZR','ZS','ZT','ZU','ZV','ZX','ZY','ZZ');
$url = 'http://islamabadexcise.gov.pk/VEH_REG/VEH_QUERY.asp?X=';
for ($outterloop = 0; $outterloop < sizeof($Alpha); $outterloop++) 
{
for ($innerloop = 100; $innerloop <10000; $innerloop++) 
{
$NewLink	=	$url . $Alpha[$outterloop] . '&Y=' . $innerloop;
$html 		= file_get_html($NewLink);
foreach($html->find("/html/body/div/table/tbody/tr[1]/td/form/table/tbody/tr[7]/td/table/tbody") as $element)
{
	if($element)
	{
		 $reg_no 		= $element->find("tr/td[2]/font" ,1)->plaintext;
		 $reg_date 		= $element->find("tr/td[2]/font" ,2)->plaintext;
		 $maker 		= $element->find("tr/td[2]/font" ,4)->plaintext;
		 $model 		= $element->find("tr/td[2]/font" ,6)->plaintext;
		 $chassis_no		= $element->find("tr/td[2]/font" ,8)->plaintext;
		 $engine_no 		= $element->find("tr/td[2]/font" ,10)->plaintext;
		 $owner 		= $element->find("tr/td[2]/font" ,12)->plaintext;
		 $sw 			= $element->find("tr/td[2]/font" ,14)->plaintext;
		 $type 			= $element->find("tr/td[2]/font" ,16)->plaintext; 
		 $NewLink;
		scraperwiki::save_sqlite(array('name'), array('name' => $reg_no , 'regdate' => $reg_date, 'maker' => $maker, 'model' => $model, 'chas' => $chassis_no, 'engine' => $engine_no, 'owner' => $owner, 'sw' => $sw, 'type' => $type, 'link' => $NewLink));
		
	
	 echo "$reg_no...\n";
  	sleep(1);
	}
}
}
}
	
?>
