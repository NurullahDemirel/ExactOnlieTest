<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->bigIncrements("Timestamp")->comment("Timestamp");
            $table->double("AmountDC")->nullable()->comment("Amount in the default currency of the company");
            $table->double("AmountDiscount")->nullable()->comment("Discount amount in the default currency of the company. Only supported for header");
            $table->double("AmountDiscountExclVat")->nullable()->comment("Discount amount excluding VAT in the default currency of the company. Only supported for header");
            $table->double("AmountFC")->nullable()->comment("Amount in the currency of the transaction");
            $table->double("AmountFCExclVat")->nullable()->comment("Amount exclude VAT in the currency of the transaction. Only supported for header");
            $table->integer("ApprovalStatus")->nullable()->comment("Shows if this sales order is approved");
            $table->longText("ApprovalStatusDescription")->nullable()->comment("Description of ApprovalStatus");
            $table->dateTime("Approved")->nullable()->comment("Approval datetime");
            $table->uuid("Approver")->nullable()->comment("User who approved the sales order");
            $table->longText("ApproverFullName")->nullable()->comment("Name of approver");
            $table->longText("CostCenter")->nullable()->comment("Reference to Cost center");
            $table->longText("CostCenterDescription")->nullable()->comment("Description of CostCenter");
            $table->double("CostPriceFC")->nullable()->comment("Item cost price");
            $table->longText("CostUnit")->nullable()->comment("Reference to Cost unit");
            $table->longText("CostUnitDescription")->nullable()->comment("Description of CostUnit");
            $table->dateTime("Created")->nullable()->comment("Creation date");
            $table->uuid("Creator")->nullable()->comment("User ID of creator");
            $table->longText("CreatorFullName")->nullable()->comment("Name of creator");
            $table->longText("Currency")->nullable()->comment("Currency code");
            $table->longText("CustomerItemCode")->nullable()->comment("Code the customer uses for this item");
            $table->uuid("DeliverTo")->nullable()->comment("Reference to the delivery customer. For an existing sales order this value can not be changed.");
            $table->uuid("DeliverToContactPerson")->nullable()->comment("Reference to contact person of delivery customer");
            $table->longText("DeliverToContactPersonFullName")->nullable()->comment("Name of contact person of delivery customer");
            $table->longText("DeliverToName")->nullable()->comment("Name of delivery customer");
            $table->uuid("DeliveryAddress")->nullable()->comment("Delivery address");
            $table->dateTime("DeliveryDate")->nullable()->comment("Delivery date of this line");
            $table->integer("DeliveryStatus")->nullable()->comment("Shipping status of the sales order line. 12=Open, 20=Partial, 21=Complete, 45=Cancelled");
            $table->longText("DeliveryStatusDescription")->nullable()->comment("Description of DeliveryStatus");
            $table->longText("Description")->nullable()->comment("Description");
            $table->double("Discount")->nullable()->comment("Discount given on the default price. Discount = (DefaultPrice of Item - PriceItem in line) / DefaultPrice of Item");
            $table->bigInteger("Division")->nullable()->comment("Division code");
            $table->uuid("Document")->nullable()->comment("Document that is manually linked to the sales order");
            $table->bigInteger("DocumentNumber")->nullable()->comment("Number of the document");
            $table->longText("DocumentSubject")->nullable()->comment("Subject of the document");
            $table->uuid("ID")->nullable()->comment("Primary key");
            $table->longText("IncotermAddress")->nullable()->comment("Address of Incoterm");
            $table->longText("IncotermCode")->nullable()->comment("Code of Incoterm");
            $table->integer("IncotermVersion")->nullable()->comment("Version of Incoterm Supported version for Incoterms : 2010, 2020");
            $table->integer("InvoiceStatus")->nullable()->comment("Invoice status of the sales order line. 12=Open, 20=Partial, 21=Complete, 45=Cancelled");
            $table->longText("InvoiceStatusDescription")->nullable()->comment("Description of InvoiceStatus");
            $table->uuid("InvoiceTo")->nullable()->comment("Reference to the customer who will receive the invoice. For an existing sales order this value can not be changed.");
            $table->uuid("InvoiceToContactPerson")->nullable()->comment("Reference to the contact person of the customer who will receive the invoice");
            $table->longText("InvoiceToContactPersonFullName")->nullable()->comment("Name of the contact person of the customer who will receive the invoice");
            $table->longText("InvoiceToName")->nullable()->comment("Name of the customer who will receive the invoice");
            $table->uuid("Item")->nullable()->comment("Reference to the item that is sold in this sales order line");
            $table->longText("ItemCode")->nullable()->comment("Code of Item");
            $table->longText("ItemDescription")->nullable()->comment("Description of Item");
            $table->uuid("ItemVersion")->nullable()->comment("Item Version");
            $table->longText("ItemVersionDescription")->nullable()->comment("Description of Item Version");
            $table->bigInteger("LineNumber")->nullable()->comment("Line number");
            $table->double("Margin")->nullable()->comment("Sales margin of the sales order line");
            $table->dateTime("Modified")->nullable()->comment("Last modified date");
            $table->uuid("Modifier")->nullable()->comment("User ID of modifier");
            $table->longText("ModifierFullName")->nullable()->comment("Name of modifier");
            $table->double("NetPrice")->nullable()->comment("Net price of the sales order line");
            $table->longText("Notes")->nullable()->comment("Extra notes");
            $table->dateTime("OrderDate")->nullable()->comment("Order date");
            $table->uuid("OrderedBy")->nullable()->comment("Customer who ordered the sales order. For an existing sales order this value can not be changed.");
            $table->uuid("OrderedByContactPerson")->nullable()->comment("Contact person of the customer who ordered the sales order");
            $table->longText("OrderedByContactPersonFullName")->nullable()->comment("Name of contact person of the customer who ordered the sales order");
            $table->longText("OrderedByName")->nullable()->comment("Name of the customer who ordered the sales order");
            $table->uuid("OrderID")->nullable()->comment("The OrderID identifies the sales order. All the lines of a sales order have the same OrderID");
            $table->bigInteger("OrderNumber")->nullable()->comment("Number of sales order");
            $table->longText("PaymentCondition")->nullable()->comment("The payment condition used for due date and discount calculation");
            $table->longText("PaymentConditionDescription")->nullable()->comment("Description of PaymentCondition");
            $table->longText("PaymentReference")->nullable()->comment("Payment reference for sales order");
            $table->uuid("Pricelist")->nullable()->comment("Price list");
            $table->longText("PricelistDescription")->nullable()->comment("Description of Pricelist");
            $table->uuid("Project")->nullable()->comment("The project to which the sales order line is linked. The project can be different per line. Sometimes also the project in the header is filled although this is not really used");
            $table->longText("ProjectCode")->nullable()->comment("Code of Project");
            $table->longText("ProjectDescription")->nullable()->comment("Description of Project");
            $table->uuid("PurchaseOrder")->nullable()->comment("Purchase order that is linked to the sales order");
            $table->uuid("PurchaseOrderLine")->nullable()->comment("Purchase order line of the purchase order that is linked to the sales order");
            $table->bigInteger("PurchaseOrderLineNumber")->nullable()->comment("Number of the purchase order line");
            $table->bigInteger("PurchaseOrderNumber")->nullable()->comment("Number of the purchase order");
            $table->double("Quantity")->nullable()->comment("The number of items sold in default units. The quantity shown in the entry screen is Quantity * UnitFactor.Positive quantity = Sales order lines, Negative quantity = Trade-in lines.");
            $table->double("QuantityDelivered")->nullable()->comment("The number of items delivered");
            $table->double("QuantityInvoiced")->nullable()->comment("The number of items invoiced");
            $table->longText("Remarks")->nullable()->comment("Extra remarks");
            $table->uuid("SalesChannel")->nullable()->comment("ID of Sales channel.");
            $table->longText("SalesChannelCode")->nullable()->comment("Code of Sales channel");
            $table->longText("SalesChannelDescription")->nullable()->comment("Description of Sales channel");
            $table->uuid("Salesperson")->nullable()->comment("Sales representative");
            $table->longText("SalespersonFullName")->nullable()->comment("Name of sales representative");
            $table->uuid("SelectionCode")->nullable()->comment("ID of selection code");
            $table->longText("SelectionCodeCode")->nullable()->comment("Code of selection code");
            $table->longText("SelectionCodeDescription")->nullable()->comment("Description of selection code");
            $table->uuid("ShippingMethod")->nullable()->comment("ShippingMethod");
            $table->longText("ShippingMethodCode")->nullable()->comment("Code of Shipping Method");
            $table->longText("ShippingMethodDescription")->nullable()->comment("Description of Shipping Method");
            $table->uuid("ShopOrder")->nullable()->comment("Reference to ShopOrder");
            $table->bigInteger("ShopOrderNumber")->nullable()->comment("Number of shop order");
            $table->integer("Status")->nullable()->comment("The status of the sales order. 12 = Open, 20 = Partial, 21 = Complete, 45 = Cancelled.");
            $table->longText("StatusDescription")->nullable()->comment("Description of Status");
            $table->uuid("TaxSchedule")->nullable()->comment("Obsolete");
            $table->longText("TaxScheduleCode")->nullable()->comment("Obsolete");
            $table->longText("TaxScheduleDescription")->nullable()->comment("Obsolete");
            $table->longText("UnitCode")->nullable()->comment("Code of item unit");
            $table->longText("UnitDescription")->nullable()->comment("Description of Unit");
            $table->double("UnitPrice")->nullable()->comment("Price per unit in the currency of the transaction");
            $table->tinyInteger("UseDropShipment")->nullable()->comment("Indicates if drop shipment is used (delivery directly to customer, invoice to wholesaler)");
            $table->double("VATAmount")->nullable()->comment("VAT amount in the currency of the transaction");
            $table->longText("VATCode")->nullable()->comment("VAT code");
            $table->longText("VATCodeDescription")->nullable()->comment("Description of VATCode");
            $table->double("VATPercentage")->nullable()->comment("The vat percentage of the VAT code. This is the percentage at the moment the sales order is created. It\'s also used for the default calculation of VAT amounts and VAT base amounts");
            $table->longText("WarehouseCode")->nullable()->comment("Code of Warehouse");
            $table->longText("WarehouseDescription")->nullable()->comment("Description of Warehouse");
            $table->uuid("WarehouseID")->nullable()->comment("Warehouse");
            $table->longText("YourRef")->nullable()->comment("The reference number of the customer");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_orders');
    }
}
