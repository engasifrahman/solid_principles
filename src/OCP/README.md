# 🧩 Open/Closed Principle (OCP)

## 📖 Definition
> Software entities (classes, modules, functions) should be **open for extension** but **closed for modification**.

---

## 🔴 Bad Example
- A `PaymentProcessor` class contains **if/else or switch statements** for Stripe, PayPal, etc.
- Adding a new payment method requires **modifying the processor**, which risks breaking existing code.

---

## 🟢 Good Example
- Define a `IPaymentMethod` **interface**.
- Each new payment method (Stripe, PayPal, ApplePay, etc.) implements the interface.
- `PaymentProcessor` depends on the abstraction, not concrete classes.
- Adding a new payment method = just add a new class, **no modification required**.

---

## 🎯 Benefits of OCP
- ✔️ Extensible without touching existing code  
- ✔️ Reduces bugs when new features are added  
- ✔️ Follows Dependency Inversion Principle (DIP) naturally  

---

## 🍬 Real-Life Analogy
Think of a **power socket** 🔌:  
- The socket (processor) doesn’t change.  
- You just plug in new devices (payment methods).  
- Each device works as long as it follows the **plug standard (interface)**.  

---
