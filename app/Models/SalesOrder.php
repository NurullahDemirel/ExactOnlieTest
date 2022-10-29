<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'Timestamp',
        'AmountDC',
        'AmountDiscount',
        'AmountDiscountExclVat',
        'AmountFC',
        'AmountFCExclVat',
        'ApprovalStatus',
        'ApprovalStatusDescription',
        'Approved',
        'Approver',
        'ApproverFullName',
        'CostCenter',
        'CostCenterDescription',
        'CostPriceFC',
        'CostUnit',
        'CostUnitDescription',
        'Created',
        'Creator',
        'CreatorFullName',
        'Currency',
        'CustomerItemCode',
        'DeliverTo',
        'DeliverToContactPerson',
        'DeliverToContactPersonFullName',
        'DeliverToName',
        'DeliveryAddress',
        'DeliveryDate',
        'DeliveryStatus',
        'DeliveryStatusDescription',
        'Description',
        'Discount',
        'Division',
        'Document',
        'DocumentNumber',
        'DocumentSubject',
        'ID',
        'IncotermAddress',
        'IncotermCode',
        'IncotermVersion',
        'InvoiceStatus',
        'InvoiceStatusDescription',
        'InvoiceTo',
        'InvoiceToContactPerson',
        'InvoiceToContactPersonFullName',
        'InvoiceToName',
        'Item',
        'ItemCode',
        'ItemDescription',
        'ItemVersion',
        'ItemVersionDescription',
        'LineNumber',
        'Margin',
        'Modified',
        'Modifier',
        'ModifierFullName',
        'NetPrice',
        'Notes',
        'OrderDate',
        'OrderedBy',
        'OrderedByContactPerson',
        'OrderedByContactPersonFullName',
        'OrderedByName',
        'OrderID',
        'OrderNumber',
        'PaymentCondition',
        'PaymentConditionDescription',
        'PaymentReference',
        'Pricelist',
        'PricelistDescription',
        'Project',
        'ProjectCode',
        'ProjectDescription',
        'PurchaseOrder',
        'PurchaseOrderLine',
        'PurchaseOrderLineNumber',
        'PurchaseOrderNumber',
        'Quantity',
        'QuantityDelivered',
        'QuantityInvoiced',
        'Remarks',
        'SalesChannel',
        'SalesChannelCode',
        'SalesChannelDescription',
        'Salesperson',
        'SalespersonFullName',
        'SelectionCode',
        'SelectionCodeCode',
        'SelectionCodeDescription',
        'ShippingMethod',
        'ShippingMethodCode',
        'ShippingMethodDescription',
        'ShopOrder',
        'ShopOrderNumber',
        'Status',
        'StatusDescription',
        'UnitCode',
        'UnitDescription',
        'UnitPrice',
        'UseDropShipment',
        'VATAmount',
        'VATCode',
        'VATCodeDescription',
        'VATPercentage',
        'WarehouseCode',
        'WarehouseDescription',
        'WarehouseID',
        'YourRef',
    ];
    public $timestamps = false;
}
