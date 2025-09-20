# 🏗 Dependency Inversion Principle (DIP)

## Definition
> High-level modules should not depend on low-level modules.  
> Both should depend on abstractions (e.g., interfaces).  
> Abstractions should not depend on details.  
> Details should depend on abstractions.

---

## 🔴 Bad Example
- `PaymentProcessor` directly creates a `StripePayment` object inside.  
- Tight coupling: if business switches to PayPal, you must modify `PaymentProcessor`.  
- ❌ Violates DIP.

---

## 🟢 Good Example
- `PaymentProcessor` depends on a `IPaymentMethod` interface.  
- Actual implementation (`StripePayment`, `PayPalPayment`, etc.) is injected at runtime.  
- High-level module (`PaymentProcessor`) only cares about the contract, not the details.  
- ✅ DIP respected.

---

## Benefits
- Promotes loose coupling.  
- Improves testability (e.g., inject mock `IPaymentMethod` in unit tests).  
- Makes it easy to extend with new payment providers without modifying core logic.  
- Aligns with Clean Architecture and modern DI containers in frameworks like Laravel, Symfony, and Spring.
