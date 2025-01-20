<?// section elements?>
<?if($arParams['SHOW_ASK_QUESTION_BLOCK'] !== 'N'):?>
	<table class="order-block bordered">
		<tbody>
			<tr>
				<td class="col-md-9 col-sm-8 col-xs-7 valign">
					<div class="block-item">
						<div class="flexbox flexbox--row">
							<div class="block-item__image icon_sendmessage"><?=CMax::showIconSvg("sendmessage", SITE_TEMPLATE_PATH."/images/svg/sendmessage.svg", "", "colored_theme_svg", true, false);?></div>
							<div class="text darken">
								<?$APPLICATION->IncludeComponent(
									 'bitrix:main.include',
									 '',
									 Array(
										  'AREA_FILE_SHOW' => 'page',
										  'AREA_FILE_SUFFIX' => 'ask',
										  'EDIT_TEMPLATE' => ''
									 )
								);?>
							</div>
						</div>
					</div>
				</td>
				<td class="col-md-3 col-sm-4 col-xs-5 valign btns-col">
					<div class="btns">
						<span><span class="btn btn-default animate-load" data-event="jqm" data-param-form_id="ASK" data-name="question"><span><?=(strlen($arParams['S_ASK_QUESTION']) ? $arParams['S_ASK_QUESTION'] : GetMessage('S_ASK_QUESTION'))?></span></span></span>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
<?endif;?>