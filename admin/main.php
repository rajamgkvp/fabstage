<?
include('../constants.php');
if($_SESSION['username'] == ''){
?>
<script language="javascript">
	window.location.href="index.php";
</script>
<?
}
?>
<html>
<head>
<title><?=TITLE?></title>
<script type="text/javascript">
	var GB_ROOT_DIR = "greybox/";
</script>

<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />
<link rel="stylesheet" href="admin_img/css/theme.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="images/favicon.ico"/>
<link rel="shortcut icon" href="favicon.ico">
</HEAD>

<body>


<? include_once('admin_header.php')?>

<table class="adminform" border="5">
<tr>
	<td valign="top">
	<?
	
switch($_REQUEST['page_id']){
	
	case 'archive_list' :
		include_once('archive_list.php');
	break;
	
	case 'user' :
		include_once('add_user.php');
	break;

	case 'user_list' :
		include_once('user_list.php');
	break;

	case 'logs' :
		include_once('logs.php');
	break;

	case 'expdb' :
		include_once('expdb.php');
	break;
	case 'news_list' :
		include_once('news_list.php');
	break;
	case 'country_list' :
		include_once('country_list.php');
	break;
		case 'county_list' :
		include_once('county_list.php');
	break;

	case 'event_list' :
		include_once('event_listing.php');
	break;
	case 'priv_shutt_list':
		include_once('priv_shutt_list.php');
	break;
	
	case 'location_list':
		include_once('location_list.php');
	break;

	case 'reg_flights_shuttles_list':
		include_once('reg_flights_shuttles_list.php');
	break;

	case 'order_list':
		include_once('order_list.php');
	break;

	case 'order_list_fs':
		include_once('order_list_fs.php');
	break;

	case 'order_list_sf':
		include_once('order_list_sf.php');
	break;

	case 'order_list_rf':
		include_once('order_list_rf.php');
	break;

	case 'order_list_pf':
		include_once('order_list_pf.php');
	break;

	case 'exce_order':
		include_once('exce_order.php');
	break;
	case 'advert_left_top':
		include_once('advert_left_top.php');
	break;
	case 'advert_left_middle':
		include_once('advert_left_middle.php');
	break;
	case 'advert_center_top':
		include_once('advert_center_top.php');
	break;
	case 'advert_center_middle':
		include_once('advert_center_middle.php');
	break;

		case 'gen_pay_list':
		include_once('gen_pay_list.php');
	break;

	case 'gen_pay':
		include_once('gen_pay.php');
	break;
	
	case 'review':
		include_once('review.php');
	break;
		case 'tm':
		include_once('tm.php');
	break;

		case 'tm':
		include_once('tm.php');
	break;

		case 'topic_list':
		include_once('topic_list.php');
	break;
			case 'faq_list':
		include_once('faq_list.php');
	break;

		case 'article_list':
		include_once('article_list.php');
	break;
		case 'flights_list':
		include_once('flights_list.php');
	break;
	case 'cms':
		include_once('cms_list.php');
	break;
	case 'gallery':
		include_once('gallery.php');
	break;
	case 'ulisting':
		include_once('user_listing.php');
	break;
	case 'order_list_pf':
		include_once('order_list_pf.php');
	break;
	case 'gt_fromloclist':
		include_once('gt_fromloclist.php');
	break;
	case 'gt_toloclist':
		include_once('gt_toloclist.php');
	break;
	case 'gt_servicelist':
		include_once('gt_servicelist.php');
	break;
	case 'gt_orderlist':
		include_once('gt_orderlist.php');
	break;
	case 'tour_listing':
		include_once('tour_listing.php');
	break;
	case 'add_talent':
		include_once('add_talent.php');
	break;
	case 'talent_list':
		include_once('talent_list.php');
	break;

   case 'add_talent_comp':
		include_once('add_talent_comp.php');
	break;
	case 'skill_list':
		include_once('skill_list.php');
	break;

	case 'company_list':
		include_once('company_list.php');
	break;

	case 'client_list':
		include_once('client_list.php');
	break;
						
	case 'category_list':
		include_once('category_list.php');
	break;

	case 'sub_category_list':
		include_once('sub_category_list.php');
	break;

	case 'jobs_list':
		include_once('jobs_list.php');
	break;

	case 'oudition_list':
		include_once('oudition_list.php');
	break;

		case 'company_category_list':
		include_once('company_category_list.php');
	break;

	case 'company_sub_category_list':
		include_once('company_sub_category_list.php');
	break;

	case 'fs_help':
		include_once('fs_help.php');   
	break;

	case 'fs_help_list':
		include_once('fs_help_list.php');  
	break;

    case 'fs_testimonials':
		include_once('fs_testimonials.php');  
	break;
	
    case 'feedback_list':
		include_once('feedback_list.php');  
	break;

	default :
	?>
		<script language="javascript">
			window.location.href = 'admin_home.php';
		</script>
		<?
	}
	?>
	</td>
</tr>
</table>	
</div>
<?
include_once('admin_footer.php');
?>

 
</body>
</html>