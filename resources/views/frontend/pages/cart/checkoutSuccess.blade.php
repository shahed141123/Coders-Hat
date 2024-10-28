<x-frontend-app-layout :title="'Checkout Success'">
    <style>
        .table thead th {
            vertical-align: middle;
            border: 1px solid #dee2e6a1;
        }

        .invoice_table td {
            vertical-align: middle !important;
        }

        .invoice_table {
            background-color: #e1ecff89;
            border-bottom: 0px;
        }

        .invoice_table td {
            border-bottom: 0px;
            border: 1px solid #dee2e6c4;
        }

        @media print {

            .card-header,
            .btn {
                display: none;
            }

            .table th,
            .table td {
                border: 1px solid #dee2e6;
            }
        }
    </style>
    <section>
        <div class="container my-5 py-5">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="p-5">
                        @include('frontend.layouts.invoice')
                        {{-- <div class="card bg-white p-0">
                            <div class="card-header bg-white border-0 p-5">
                                <div class="row mt-5">
                                    <div class="col-lg-6">
                                        <div class="pb-5">
                                            <img class="text-right" width="150px"
                                                src="{{ !empty(optional($setting)->site_logo_black) ? asset('storage/' . optional($setting)->site_logo_black) : asset('frontend/img/logo.png') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h1 class="text-right mb-0">Invoice</h1>
                                    </div>
                                    <div class="col-lg-4">
                                        <div
                                            style="background-color: #e1ecff; clip-path: polygon(90% 0, 100% 50%, 90% 99%, 0% 100%, 0 53%, 0% 0%);">
                                            <p class="mb-0 p-3"><span class="text-dark">Invoice No:</span>
                                                #{{ $order->order_number }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="mb-0 p-3 text-right">Date: {{ $order->created_at->format('d M, Y') }}</p>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-lg-6">
                                        <div>
                                            <span class="font-weight-bold">Invoice To:</span>
                                            <p class="mb-0">{{ optional($order->user)->first_name }}</p>
                                            <p class="mb-0">{{ optional($order->user)->phone }}</p>
                                            <p class="mb-0">{{ optional($order->user)->email }}</p>
                                            <p class="mb-0">{{ $order->billing_address }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="text-right">
                                            <span class="font-weight-bold">Shipping From:</span>
                                            <p class="mb-0">{{optional($setting)->website_name}}</p>
                                            <p class="mb-0">{{ optional($setting)->primary_phone }}</p>
                                            <p class="mb-0">{{ optional($setting)->contact_email }}</p>
                                            <p class="mb-0">{{ optional($setting)->address_line_one }}</p>
                                            <p class="mb-0">{{ optional($setting)->address_line_two }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5 pt-5">
                                    <div class="col-lg-12">
                                        <h4>Order Information:</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr style="background-color: #e1ecff;">
                                                        <th width="5%">Sl.</th>
                                                        <th width="10%">Img</th>
                                                        <th width="35%">Product Description</th>
                                                        <th width="15%">Price</th>
                                                        <th width="10%" class="text-center">Qty</th>
                                                        <th width="10%" class="text-right">SKU Code</th>
                                                        <th width="15%" class="text-right">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($order->orderItems as $item)
                                                        <tr>
                                                            <td>
                                                                <span>{{ $loop->iteration }}</span>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    <img width="50px" height="50px"
                                                                        style="border-radius: 5px;"
                                                                        src="{{ asset('storage/' . optional($item->product)->thumbnail) }}"
                                                                        alt="">
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span>{{ Str::limit(optional($item->product)->name, 30) }}</span>
                                                            </td>
                                                            <td>
                                                                <span><span class="text-info">(£)</span>{{ optional($item)->quantity * optional($item)->price }}</span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span>{{ optional($item)->quantity }}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <span>{{ optional($item->product)->sku_code }}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <span><span class="text-info">(£)</span>{{ optional($item)->quantity * optional($item)->price }}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr class="">
                                                        <td colspan="6" class="text-right">
                                                            <span>Subtotal</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <span><span class="text-info">(£)</span>{{ $order->sub_total }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="">
                                                        <td colspan="6" class="text-right">
                                                            <span>VAT (0%)</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <span><span class="text-info">(£)</span>0.00</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="">
                                                        <td colspan="6" class="text-right">
                                                            <span>Shipping Charge</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <span><span class="text-info">(£)</span>{{ $order->shippingCharge->price }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="invoice_table">
                                                        <td colspan="6" class="text-right">
                                                            <span>Grand Total</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <span><span class="text-info">(£)</span>{{ number_format($order->total_amount, 2) }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5 pt-5">
                                    <div class="col-lg-12">
                                        <hr>
                                        <p class="text-center">
                                            <i class="fa-solid fa-file"></i> <strong>NOTE:</strong> This is a
                                            computer-generated receipt and does not require a physical signature.
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-center align-items-center py-5 my-5">
                                            <button class="btn btn-info print p-3"><i class="fa-solid fa-print"></i> Print
                                                Invoice</button>
                                            <button class="btn btn-info ml-3 p-3" onclick="downloadInvoice()"><i
                                                    class="fa-solid fa-file-download"></i> Download Invoice</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer p-4 text-center border-0" style="background-color: #e1ecff;">
                                © {{optional($setting)->website_name}}, LTD 2024.
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script src="https://cdn.sheetjs.com/xlsx-0.19.1/xlsx.full.min.js"></script>
    @endpush
</x-frontend-app-layout>
