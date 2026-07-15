# DWatson Pharmacy Database & Management Portal 💊🏪

An enterprise-grade PHP and MySQL Database and Management System designed to streamline, track, and manage the complex day-to-day operations of the prestigious **D Watson Pharmacy** chain. This application features a dual-portal architecture, balancing a secure administrative backend for store managers and cashiers with an accessible customer portal for processing online medical orders.

The system utilizes a unified relational database schema to eliminate data redundancy, maintain strict transactional integrity, and coordinate medicine inventories across multiple physical branches in real-time.

---

## 🛠️ Technology Stack

- **Frontend / Portal Interface:** HTML5, CSS3, JavaScript (Designed with a clean, branded red-white color palette for strong visual identity)
- **Backend Scripting:** PHP (Object-Oriented / Procedural)
- **Database Engine:** MySQL 

---

## 🖥️ Detailed Feature Breakdown & Portals

### 1. Welcome & Access Portals
*   **Homepage (Welcome Screen):** The main landing screen featuring official DWatson Pharmacy branding, a high-quality pharmaceutical background, and clear entry points. Users are presented with two primary path buttons: **Admin Panel** or **Customer - Place Order**.
*   **About Us Page:** Provides a detailed overview of D Watson’s retail healthcare mission in Pakistan alongside store imagery, built-in footer contact forms (email, phone, address), and standard branding.
*   **Secure Admin Login:** A specialized authentication interface requiring store managers or cashiers to input valid admin credentials before system access is authorized.

### 2. Administrative Profile & Dashboard
*   **Central Control Hub (Admin Profile):** Once logged in, administrators are welcomed with their profile summary and a prominent, quick-access navigation sidebar. This sidebar enables instant toggling between all core database operations: customer entry, medicine tracking, transaction records, inventory reports, and warning panels.

### 3. Customer & Patient Records
*   **Add New Customer:** A dedicated PHP entry interface to register new shoppers. Database input fields include **Name**, **Phone Number**, and **Address**. Upon clicking the "Add Customer" button, a dedicated visual confirmation popup confirms the database record has been successfully committed.
*   **View & Edit Customer Profiles:** Allows administrators to retrieve active customer profiles from MySQL to update contact numbers, adjust physical addresses, or remove invalid accounts.

### 4. Comprehensive Medicine & Supplier Cataloging
*   **Add New Medicine:** An exhaustive form to enter fresh stock batches. Crucial data captured includes **Medicine Name**, **Brand**, **Price**, **Expiry Date**, **Category**, and designated **Supplier**. Strict form validation ensures data integrity before saving.
*   **Search Medicine Engine:** A responsive MySQL querying tool where staff can type full or partial keywords (e.g., searching "Panadol"). It returns matching rows in a clean structured table listing ID, Name, Brand, Category, Price, and Expiry.

### 5. Multi-Branch Inventory Coordination
*   **Inventory by Branch Report:** Displays a unified, readable table showing where medicines are physically stored. This tracks specific stock amounts across prominent localized branches (e.g., **Bhara Kahu, F-10 Markaz, F-11 Markaz, F-6 Markaz, F-7 Markaz**).
*   **Update Inventory for Branch:** A logistical tool allowing staff to select a specific branch from a dropdown, search a medicine, and enter the quantity to add or update. This is crucial for logging fresh deliveries or processing inter-branch stock transfers.
*   **Low Stock Alerts:** A minimal warning module designed to protect store operations. If stock levels fall below critical thresholds, the system flags the item; otherwise, it displays a clean, green checkmark confirming all branches have sufficient medication quantities.

### 6. Billing, Sales, & Point-of-Sale (POS)
*   **Record New Sales (Billing Interface):** The primary terminal used by cashiers during checkout. It allows selection of the customer, the medicine, purchase quantity, and preferred **Payment Method** (Cash, Card, or Online). The system automatically calculates transaction totals to generate PHP-rendered invoices.
*   **Record Sold Item for Existing Sale:** A helper module allowing cashiers to select an existing Sale ID from a dropdown to add additional purchase lines (Medicine, Quantity, and Unit Price) directly to that historical bill.
*   **Detailed Sales Report & History:** A comprehensive analytical ledger tracking every single transaction executed across the network. Admin-level tables capture the Sale ID, Customer Name, handling Employee, precise timestamp, Bill Amount, and Payment status.

### 7. Consumer Ordering System
*   **Order Medicines Form:** The customer-facing digital ordering slip. Patients enter their Full Name and Phone Number, choose their closest local pickup branch, select their required medications, specify quantities, and choose their payment method.
*   **Order Confirmation Screen:** Upon successful submission, customers are presented with a peaceful thank-you screen confirming their digital request has been received and that the corresponding branch team will contact them shortly to finalize order delivery.

---

## 🚀 Quick Setup & Installation

To run this application locally, ensure you have a standard PHP development server like **XAMPP** or **WAMP** installed.

1. **Clone the repository:**
   ```bash
   git clone [https://github.com/Maarij-x04/dwatson-pharmacy-website.git](https://github.com/Maarij-x04/dwatson-pharmacy-website.git)
