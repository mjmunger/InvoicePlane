<div class="table-responsive">
    <table class="table table-striped no-margin">

        <thead>
        <tr>
            <th><?php echo trans('invoice'); ?></th>
            <th><?php echo trans('created'); ?></th>
            <th><?php echo trans('due_date'); ?></th>
            <th><?php echo trans('client_name'); ?></th>
            <th><?php echo trans('amount'); ?></th>
            <th><?php echo trans('balance'); ?></th>
            <th><?php echo trans('options'); ?></th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($invoices as $invoice) { ?>
            <tr>
                <td>
                    <a href="<?php echo site_url('guest/invoices/view/' . $invoice->invoice_id); ?>"><?php echo $invoice->invoice_number; ?></a>
                </td>
                <td>
                    <?php echo date_from_mysql($invoice->invoice_date_created); ?>
                </td>
                <td>
                    <?php if ($invoice->invoice_date_due < date('Y-m-d')) : ?>
                        <span class="font-overdue">
                            <?php echo date_from_mysql($invoice->invoice_date_due); ?>
                        </span>
                    <?php else : ?>
                        <?php echo date_from_mysql($invoice->invoice_date_due); ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php echo $invoice->client_name; ?>
                </td>
                <td>
                    <?php echo format_currency($invoice->invoice_total); ?>
                </td>
                <td>
                    <?php echo format_currency($invoice->invoice_balance); ?>
                </td>
                <td>
                    <div class="options btn-group btn-group-sm">
                        <?php if (get_setting('enable_online_payments') == 'on') : ?>
                            <a href="<?php echo site_url('guest/payment_information/form/' . $invoice->invoice_url_key); ?>"
                               class="btn btn-primary">
                                <i class="fa fa-credit-card"></i>
                                <?php echo trans('pay_now'); ?>
                            </a>
                        <?php endif; ?>
                        <a href="<?php echo site_url('guest/invoices/view/' . $invoice->invoice_id); ?>"
                           class="btn btn-default">
                            <i class="fa fa-eye"></i>
                            <?php echo trans('view'); ?>
                        </a>
                        <a href="<?php echo site_url('guest/invoices/generate_pdf/' . $invoice->invoice_id); ?>"
                           class="btn btn-default">
                            <i class="fa fa-print"></i>
                            <?php echo trans('pdf'); ?>
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>

    </table>
</div>