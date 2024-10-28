<div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="d-flex flex-column flex-column-fluid">
        <div class="scroll-y flex-column-fluid px-10 py-10" data-kt-scroll="true" data-kt-scroll-activate="true"
            data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header_nav" data-kt-scroll-offset="5px"
            data-kt-scroll-save-state="true"
            style="background-color: rgb(213, 217, 226); --kt-scrollbar-color: #d9d0cc; --kt-scrollbar-hover-color: #d9d0cc; height: 158px;">
            <style>
                html,
                body {
                    padding: 0;
                    margin: 0;
                    font-family: Inter, Helvetica, "sans-serif";
                }

                a:hover {
                    color: #009ef7;
                }
            </style>

            <div id="#kt_app_body_content"
                style="background-color:#D5D9E2; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
                <div
                    style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto"
                        style="border-collapse:collapse">
                        <tbody>
                            <tr>
                                <td align="center" valign="center" style="text-align:center; padding-bottom: 10px">


                                    <div style="text-align:center; margin:0 60px 34px 60px">

                                        <div style="margin-bottom: 10px">
                                            <a href="#" rel="noopener">
                                                <img alt="Logo"
                                                    src="{{ asset('storage/' . $setting->site_logo_black) }}"
                                                    style="height: 35px">
                                            </a>
                                        </div>

                                        <div
                                            style="font-size: 14px; font-weight: 500; margin-bottom: 42px; font-family:Arial,Helvetica,sans-serif">
                                            <p
                                                style="margin-bottom:9px; text-align: left; color:#181C32; font-size: 22px; font-weight:700">
                                                Hello {{ $data['user']->name }},</p>
                                            <p style="margin-bottom:2px; text-align: left; color:#7E8299">Thank you for
                                                your order!</p>
                                            <p style="margin-bottom:2px; text-align: left; color:#7E8299">Your order
                                                number is: <strong>{{ $data['order']->order_number }}</p>
                                        </div>



                                        <div style="margin-bottom: 15px">

                                            <h3
                                                style="text-align:left; color:#181C32; font-size: 18px; font-weight:600; margin-bottom: 22px">
                                                Order summary</h3>



                                            <div style="padding-bottom:9px">

                                                @foreach ($data['order_items'] as $item)
                                                    <div
                                                        style="display:flex; justify-content: space-between; color:#7E8299; font-size: 14px; font-weight:500; margin-bottom:8px">

                                                        <div style="font-family:Arial,Helvetica,sans-serif">
                                                            {{ $item->product_name }}</div>
                                                        <div style="font-family:Arial,Helvetica,sans-serif">£
                                                            {{ $item->quantity }} x {{ optional($item)->price }}</div>

                                                    </div>
                                                @endforeach
                                                <div
                                                    style="display:flex; justify-content: space-between; color:#7E8299; font-size: 14px; font-weight:500">

                                                    <div style="font-family:Arial,Helvetica,sans-serif">SubTotal</div>
                                                    <div
                                                        style="color:#50cd89; font-weight:700; font-family:Arial,Helvetica,sans-serif">
                                                        £ {{ $data['order']->sub_total }}</div>

                                                </div>


                                                <div
                                                    style="display:flex; justify-content: space-between; color:#7E8299; font-size: 14px; font-weight:500;">
                                                    <div style="font-family:Arial,Helvetica,sans-serif">Shipping Charge
                                                    </div>
                                                    <div style="font-family:Arial,Helvetica,sans-serif">£
                                                        {{ $data['order']->shippingCharge->price }}</div>
                                                </div>



                                                <div class="separator separator-dashed" style="margin:15px 0"></div>

                                                <div
                                                    style="display:flex; justify-content: space-between; color:#7E8299; font-size: 14px; font-weight:500">
                                                    <div style="font-family:Arial,Helvetica,sans-serif">Total</div>
                                                    <div
                                                        style="color:#50cd89; font-weight:700; font-family:Arial,Helvetica,sans-serif">
                                                        £ {{ number_format($data['order']->total_amount, 2) }}</div>

                                                </div>

                                            </div>

                                        </div>


                                    </div>

                                </td>
                            </tr>



                            <tr>
                                <td align="center" valign="center"
                                    style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
                                    <p
                                        style="color:#181C32; font-size: 16px; font-weight: 600; margin-bottom:9px                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ">
                                        It’s all about customers!</p>
                                    <p style="margin-bottom:2px">Call our customer care number:
                                        {{ $setting->primary_phone }}</p>
                                    <p style="margin-bottom:4px">You may reach us at <a
                                            href="mailto:{{ $setting->contact_email }}" rel="noopener" target="_blank"
                                            style="font-weight: 600">{{ $setting->contact_email }}</a>.</p>
                                    <p>We serve Monday – Friday: 9:00-20:00; Saturday: 11:00 – 15:00</p>
                                </td>
                            </tr>

                            <!-- <tr>
                            <td align="center" valign="center" style="text-align:center; padding-bottom: 20px;">
                                <a href="#" style="margin-right:10px"><img alt="Logo" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/email/icon-linkedin.svg"></a>
                                <a href="#" style="margin-right:10px"><img alt="Logo" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/email/icon-facebook.svg"></a>
                                <a href="#"><img alt="Logo" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/email/icon-twitter.svg"></a>
                            </td>
                        </tr> -->

                            <tr>
                                <td align="center" valign="center"
                                    style="font-size: 13px; padding:0 15px; text-align:center; font-weight: 500; color: #A1A5B7;font-family:Arial,Helvetica,sans-serif">
                                    <p> © Copyright {{ $setting->website_name }}.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>

    </div>


</div>
