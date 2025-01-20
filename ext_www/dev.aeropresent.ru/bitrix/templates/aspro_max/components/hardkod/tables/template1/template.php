<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<div class="container__tabs">
	<? $this->SetViewTarget("sidebar_tables"); ?>
	<div class="tabs">
		<?php foreach ($arResult["SECTIONS"] as $index => $arSection): ?>
			<div class="tab<?php if ($index == 0) echo ' active'; ?>" data-tab="<?php echo $index; ?>">
				<?php echo $arSection["NAME"]; ?>
				<?php if ($index == 0): ?>
					<div class="arrow-2">
						<div class="arrow-2-top"></div>
						<div class="arrow-2-bottom"></div>
					</div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
	<? $this->EndViewTarget("sidebar_tables"); ?>
	<div class="tab-content">
		<?php foreach ($arResult["SECTIONS"] as $index => $arSection): ?>

			<div class="tab-pane<?php if ($index == 0) echo ' active'; ?>" data-tab="<?php echo $index; ?>">

				<?
				if(!empty($arSection['TOP_BLOCK_DESCRIPTION'])):?>
					<div class="top__description">
						<?=$arSection['TOP_BLOCK_DESCRIPTION']?>
					</div>
				<? endif;?>
				<div class="tab-content__table table-responsive">

				<table class="main sticky-enabled sticky-table drupal-table small">
					<tbody>
					<?php foreach ($arSection["ELEMENTS"] as $rowIndex => $arElement): ?>
						<tr>
							<td><?php echo $arElement["NAME"]; ?></td>
							<?php $propertyCount = count($arElement["PROPERTY_VALUES"]); ?>
							<?php foreach ($arElement["PROPERTY_VALUES"] as $colIndex => $value): ?>
								<?php if ($rowIndex == 0 && $colIndex == $propertyCount - 2): ?>
								<td colspan="2">
									<table class="inside">
										<tr >
											<td colspan="2">Надув</td>
										</tr>
										<tr>
											<td>Гелий</td>
											<td>Воздух</td>
										</tr>
									</table>
								</td>
									<?php break; ?>
								<?php elseif ($rowIndex == 0 && $colIndex == $propertyCount - 1): ?>
									<?php continue; ?>
								<?php else: ?>
									<td><?php echo $value; ?></td>
								<?php endif; ?>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				</div>
				<?if(!empty($arSection['DESCRIPTION'])):?>
				<div class="tab__description">
					<?=$arSection['DESCRIPTION']?>
				</div>
				<?endif;?>
			</div>
		<?php endforeach; ?>
	</div>
</div>
