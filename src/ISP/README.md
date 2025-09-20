# 🏗 Interface Segregation Principle (ISP)

## Definition
> Clients should not be forced to depend on methods they do not use.  
> Split large interfaces into smaller, more specific ones.

---

## 🔴 Bad Example
- Single `IPaymentGateway` interface has `pay()`, `scheduleRecurring()`, `refund()`.
- PayPal forced to implement `scheduleRecurring()` which it does not support.
- ❌ Violates ISP.

---

## 🟢 Good Example
- Split interfaces: `IPaymentMethod`, `IRecurringPayment`, `IRefundable`.
- Stripe implements all supported features.
- PayPal implements only supported features (`IPaymentMethod`, `IRefundable`).
- ✅ ISP respected.

---

## Benefits
- Classes only implement methods they actually support.
- Avoids forcing clients to implement unsupported methods.
- Compatible with SRP, OCP, and LSP principles.
