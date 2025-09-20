# 📘 SOLID Principles in PHP

This repository demonstrates the **SOLID principles** using real-world **Payment System** examples in PHP.  
Each principle contains both a **bad example (violation)** and a **good example (refactored)**, along with a `README.md` explaining the principle.

---

## 🔑 What are SOLID Principles?
SOLID is an acronym for **five design principles** that help developers create maintainable, scalable, and testable software:

1. **S** – Single Responsibility Principle (SRP)  
2. **O** – Open/Closed Principle (OCP)  
3. **L** – Liskov Substitution Principle (LSP)  
4. **I** – Interface Segregation Principle (ISP)  
5. **D** – Dependency Inversion Principle (DIP)  

---

## 📂 Project Structure
```

solid\_principles/
│── src/
│   ├── SRP/   # Single Responsibility Principle
│   ├── OCP/   # Open/Closed Principle
│   ├── LSP/   # Liskov Substitution Principle
│   ├── ISP/   # Interface Segregation Principle
│   ├── DIP/   # Dependency Inversion Principle
│   └── Common/ # Shared utilities (Logger, EmailNotifier, Database setup)
│
│── demo/
│   ├── SrpDemo.php
│   ├── Ocpemo.php
│   ├── LspDemo.php
│   ├── IspDemo.php
│   └── DipDemo.php
│
│── composer.json
│── README.md   # (this file)

````

---

## 📚 Principles Overview

### 1️⃣ [Single Responsibility Principle (SRP)](src/SRP/README.md)
> A class should have only one reason to change.  
- ❌ Bad: `PaymentProcessor` does payment + DB save + logging + email.  
- ✅ Good: Each responsibility is separated (`PaymentProcessor`, `PaymentRepository`, `Logger`, `EmailNotifier`).

---

### 2️⃣ [Open/Closed Principle (OCP)](src/OCP/README.md)
> Software entities should be open for extension, but closed for modification.  
- ❌ Bad: Adding a new payment method requires modifying `PaymentProcessor`.  
- ✅ Good: `PaymentProcessor` depends on `PaymentMethod` interface → easily extend with `StripePayment`, `PayPalPayment`.

---

### 3️⃣ [Liskov Substitution Principle (LSP)](src/LSP/README.md)
> Subtypes must be substitutable for their base types.  
- ❌ Bad: `PayPalPayment` forced to implement unsupported methods (`buyNowPayLater`) → runtime errors.  
- ✅ Good: Split abstractions. `StripePayment` supports BNPL, `PayPalPayment` does not, avoiding invalid substitutions.

---

### 4️⃣ [Interface Segregation Principle (ISP)](src/ISP/README.md)
> Clients should not be forced to depend on methods they do not use.  
- ❌ Bad: One big `IPaymentMethod` forces all methods on every provider.  
- ✅ Good: Smaller interfaces (`IPaymentMethod`, `IRefundable`, `IRecurringPayment`) → providers only implement what they support.

---

### 5️⃣ [Dependency Inversion Principle (DIP)](src/DIP/README.md)
> High-level modules should not depend on low-level modules. Both should depend on abstractions.  
- ❌ Bad: `PaymentProcessor` directly creates `StripePayment`.  
- ✅ Good: `PaymentProcessor` depends on `IPaymentMethod` interface → actual implementation injected at runtime.

---

## 🚀 How to Run
1. Install dependencies (only `composer` autoloading is used):
    ```bash
    composer dump-autoload
    ```
---

2. Run individual demos:

   ```bash
   php demo/SrpDemo.php
   php demo/OcpDemo.php
   php demo/LspDemo.php
   php demo/IspDemo.php
   php demo/DipDemo.php
   ```

---

## ✅ Benefits of Following SOLID

* Cleaner and more maintainable codebase.
* Easy to extend with new features.
* Better testability (thanks to abstractions and dependency injection).
* Aligns with modern frameworks (Laravel, Symfony) and Clean Architecture practices.

