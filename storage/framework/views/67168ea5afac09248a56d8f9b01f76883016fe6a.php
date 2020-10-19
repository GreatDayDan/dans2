<?php $__env->startSection('content'); ?>
<div class="container">
  <?php if(session('status')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
      <form name='f1' action="<?php echo e(url('/addEvent')); ?>"  method="post">
          <?php echo csrf_field(); ?>
          <div class="form-group">
              <label for="event_id">Choose an Event</label>
              <select name="event_id" id="event_id" size="" class="form-control">
                  <?php $__currentLoopData = $jdevents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option name="pid" value="<?php echo e($event->id); ?>" id="event"><?php echo e($event->event); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <p>
                  <input type="text" id="hideme">
                  <input type="text" id="ename" name="EVENT" width="600" value=""
                         placeholder="Select an existing event from the list or enter a new event here.">
              </p>
              <p>
                  <label id="label4" for="DESCRIPTION">Description</label>
                  <textarea id="descr" rows="5" cols="50" form="f1" name="DESCRIPTION" placeholder="Describe the event"
                            id="DESCRIPTION"></textarea>
              </p>

              <input type='submit' id='submit_id' name='submit_id'>
          </div>
    </form>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp64\www\dans2\resources\views/events.blade.php ENDPATH**/ ?>