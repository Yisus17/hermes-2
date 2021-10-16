<?php
// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
  $trail->push('Menú', route('dashboard'));
});

/********* CONTACTOS ***********/ 

// Dashboard > Contactos
Breadcrumbs::for('clients', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Contactos', route('clients.index'));
});

// Dashboard > Contactos > Crear contacto
Breadcrumbs::for('clients.create', function ($trail) {
  $trail->parent('clients');
  $trail->push('Crear contacto', route('clients.create'));
});

// Dashboard > Facturas > Mostrar factura
Breadcrumbs::for('clients.show', function ($trail, $item) {
  $trail->parent('clients');
  $trail->push($item->business_name , route('clients.show', $item->id));
});

// Dashboard > Facturas > Editar factura
Breadcrumbs::for('clients.edit', function ($trail, $item) {
  $trail->parent('clients');
  $trail->push('Editar contacto', route('clients.edit', $item->id));
});

/********* PRODUCTOS ***********/ 

// Dashboard > Productos
Breadcrumbs::for('products', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Inventario', route('products.index'));
});

// Dashboard > Presupuestos > Crear producto
Breadcrumbs::for('products.create', function ($trail) {
  $trail->parent('products');
  $trail->push('Crear producto', route('products.create'));
});

// Dashboard > Presupuestos > Mostrar producto
Breadcrumbs::for('products.show', function ($trail, $item) {
  $trail->parent('products');
  $trail->push('Producto '.$item->code , route('products.show', $item->id));
});

// Dashboard > Presupuestos > Editar producto
Breadcrumbs::for('products.edit', function ($trail, $item) {
  $trail->parent('products');
  $trail->push('Editar producto', route('products.edit', $item->id));
});


/********* PRESUPUESTOS ***********/ 

// Dashboard > Presupuestos
Breadcrumbs::for('budgets', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Presupuestos', route('budgets.index'));
});

// Dashboard > Presupuestos > Crear presupuesto
Breadcrumbs::for('budgets.create', function ($trail) {
  $trail->parent('budgets');
  $trail->push('Crear presupuesto', route('budgets.create'));
});

// Dashboard > Presupuestos > Mostrar presupuesto
Breadcrumbs::for('budgets.show', function ($trail, $item) {
  $trail->parent('budgets');
  $trail->push('Presupuesto #'.numerationReportFormat($item->id) , route('budgets.show',$item->id));
});

// Dashboard > Presupuestos > Editar presupuesto
Breadcrumbs::for('budgets.edit', function ($trail, $item) {
  $trail->parent('budgets');
  $trail->push('Editar presupuesto #'. numerationReportFormat($item->id), route('budgets.edit', $item->id));
});

/********* FACTURAS ***********/ 

// Dashboard > Facturas
Breadcrumbs::for('invoices', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Facturas', route('invoices.index'));
});

// Dashboard > Facturas > Crear factura
Breadcrumbs::for('invoices.create', function ($trail) {
  $trail->parent('invoices');
  $trail->push('Crear factura', route('invoices.create'));
});

// Dashboard > Facturas > Mostrar factura
Breadcrumbs::for('invoices.show', function ($trail, $item) {
  $trail->parent('invoices');
  $trail->push('Factura #'.numerationReportFormat($item->secuence_number) , route('invoices.show',$item->id));
});

// Dashboard > Facturas > Editar factura
Breadcrumbs::for('invoices.edit', function ($trail, $item) {
  $trail->parent('invoices');
  $trail->push('Editar factura #'. numerationReportFormat($item->id), route('invoices.edit', $item->id));
});

/********* Usuarios ***********/ 

// Dashboard > Usuarios
Breadcrumbs::for('users', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Usuarios', route('users.index'));
});

// Dashboard > Usuarios > Crear usuario
Breadcrumbs::for('users.create', function ($trail) {
  $trail->parent('users');
  $trail->push('Crear usuario', route('users.create'));
});

// Dashboard > Usuarios > Mostrar usuario
Breadcrumbs::for('users.show', function ($trail, $item) {
  $trail->parent('users');
  $trail->push($item->name , route('users.show', $item->id));
});

// Dashboard > Usuarios > Editar usuario
Breadcrumbs::for('users.edit', function ($trail, $item) {
  $trail->parent('users');
  $trail->push('Editar usuario', route('users.edit', $item->id));
});

/********* Emprendimientos ***********/ 

// Dashboard > Emprendimientos
Breadcrumbs::for('companies', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Emprendimientos', route('companies.index'));
});

// Dashboard > Emprendimientos > Crear emprendimiento
Breadcrumbs::for('companies.create', function ($trail) {
  $trail->parent('companies');
  $trail->push('Crear emprendimiento', route('companies.create'));
});

// Dashboard > Emprendimientos > Mostrar emprendimiento
Breadcrumbs::for('companies.show', function ($trail, $item) {
  $trail->parent('companies');
  $trail->push($item->name , route('companies.show', $item->id));
});

// Dashboard > Emprendimientos > Editar emprendimiento
Breadcrumbs::for('companies.edit', function ($trail, $item) {
  $trail->parent('companies');
  $trail->push('Editar emprendimiento', route('companies.edit', $item->id));
});