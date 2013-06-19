<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
| -------------------------------------------------------------------
|  Project Name
| -------------------------------------------------------------------
|
| Base Page-Title|
|
*/

$config['project_name'] = "aiko物販管理画面";

/*
| -------------------------------------------------------------------
|  Code
| -------------------------------------------------------------------
|
|
*/

/* enabled */
$config['code']['enabled_true']		= 1;
$config['code']['enabled_false']		= 0;
$config['code']['enabled']	= array(
										$config['code']['enabled_true']		=> '使用する'
									,	$config['code']['enabled_false']	=> '使用しない'
								);
								
/* ステータス */
$config['code']['status_none']				= 0;
$config['code']['status_try']				= 5;
$config['code']['status_capcha_failed']		= 7;
$config['code']['status_failed']			= 8;
$config['code']['status_apply']				= 9;
$config['code']['status']	= array(
										$config['code']['status_none']				=> '未申請'
									,	$config['code']['status_try']				=> '申請中'
									,	$config['code']['status_capcha_failed']		=> 'キャプチャ解析失敗'
									,	$config['code']['status_failed']			=> '申請失敗'
									,	$config['code']['status_apply']				=> '申請済'
								);

/* ステータス */
$config['code']['tutorial_status_none']				= 0;
$config['code']['tutorial_status_try']				= 5;
$config['code']['tutorial_status_failed']			= 7;
$config['code']['tutorial_status_pass']				= 9;
$config['code']['tutorial_status']	= array(
										$config['code']['tutorial_status_none']				=> '未チュート'
									,	$config['code']['tutorial_status_try']				=> 'チュート中'
									,	$config['code']['tutorial_status_failed']			=> 'チュート失敗'
									,	$config['code']['tutorial_status_pass']				=> 'チュート済'
								);

/* スケジュールステータス */
$config['code']['schedule_status_ready']	= 0;
$config['code']['schedule_status_stop']		= 2;
$config['code']['schedule_status_max']		= 8;
$config['code']['schedule_status_done']		= 9;

$config['code']['schedule_status']	= array(
										$config['code']['schedule_status_ready']	=> array(
																								'caption'	=>	'未稼働'
																							,	'color'		=>	'000000'
																							)
									,	$config['code']['schedule_status_stop']		=> array(
																								'caption'	=>	'停止中'
																							,	'color'		=>	'e0e0e0'
																							)
									,	$config['code']['schedule_status_max']		=> array(
																								'caption'	=>	'送信完了'
																							,	'color'		=>	'0000ff'
																							)
									,	$config['code']['schedule_status_done']		=> array(
																								'caption'	=>	'稼働済'
																							,	'color'		=>	'ff0000'
																							)
								);
