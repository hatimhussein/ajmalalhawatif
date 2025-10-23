<?php if($input->key == 'phone'): ?>
    <div class="row">
        <div class="col-md-8 col-xs-8">
            <label for="phone"
                   class="required"><?php echo e(__('warrantymodule::insurance.phone')); ?>

                <?php if($input->value_en): ?><em class="required">*</em><?php endif; ?>
            </label>
            <div class="input-box">
                <input type="number" name="<?php echo e($input->key); ?>"
                       <?php echo e(($read_only ?? false) ? 'readonly' : ''); ?>

                       <?php echo e(($disabled ?? false) ? 'readonly' : ''); ?>

                       title="Phone Number" id="<?php echo e($input->key); ?>"
                       class="input-text form-control <?php echo e($input->value_en ? 'required-entry' : ''); ?>"
                       value="<?php echo e($value ?? ''); ?>">
            </div>
        </div>
        <div class="col-md-4 col-xs-4">
            <label for="phone_code_id" class="required"><?php echo e(__('usermodule::login.choose_phone_code')); ?>

                <?php if($input->value_en): ?><em class="required">*</em><?php endif; ?>
            </label>
            <div class="input-box">
                <select name="phone_code_id" title="Phone Code"
                        <?php echo e(($read_only ?? false) ? 'disabled' : ''); ?>

                        <?php echo e(($disabled ?? false) ? 'disabled' : ''); ?>

                        class="input-text form-control <?php echo e($input->value_en ? 'required-entry' : ''); ?> select2"
                        <?php echo e($input->value_en ? 'required' : ''); ?>

                        autocomplete="off">
                </select>
            </div>
        </div>
    </div>
<?php else: ?>
    <label for="<?php echo e($input->key); ?>"><?php echo e(__('warrantymodule::'.($localeFile ?? 'warranty').'.'.$input->key)); ?>

        <?php if($input->value_en): ?><em class="required">*</em><?php endif; ?>
    </label>
    <div class="input-box">
        <input type="<?php echo e($input->properties['type']); ?>" name="<?php echo e($input->key); ?>"
               <?php echo e(($read_only ?? false) ? 'readonly' : ''); ?>

               <?php echo e(($disabled ?? false) ? 'readonly' : ''); ?>

               title="<?php echo e(__('warrantymodule::'.($localeFile ?? 'warranty').'.'.$input->key)); ?>" id="<?php echo e($input->key); ?>"
               class="input-text form-control <?php echo e($input->value_en ? 'required-entry' : ''); ?>"
               value="<?php echo e($value ?? ''); ?>">
    </div>
<?php endif; ?>
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/WarrantyModule\Resources/views/front/includes/input.blade.php ENDPATH**/ ?>