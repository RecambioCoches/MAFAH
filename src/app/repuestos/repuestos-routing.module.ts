import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { RepuestoDetailComponent } from './repuesto-detail/repuesto-detail.component';
import { RepuestoEditComponent } from './repuesto-edit/repuesto-edit.component';
import { RepuestoNewComponent } from './repuesto-new/repuesto-new.component';

const routes: Routes = [
  { path: 'repuestos/:id/new', component: RepuestoNewComponent },
  { path: 'repuestos/:repuestoId', component: RepuestoDetailComponent },
  { path: 'repuestos/:id/edit', component: RepuestoEditComponent },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class RepuestosRoutingModule {}
