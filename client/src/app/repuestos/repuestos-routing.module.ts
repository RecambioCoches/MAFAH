import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AuthGuard } from '../core/auth.guard';
import { RepuestoDetailComponent } from './repuesto-detail/repuesto-detail.component';
import { RepuestoEditComponent } from './repuesto-edit/repuesto-edit.component';
import { RepuestoNewComponent } from './repuesto-new/repuesto-new.component';

const routes: Routes = [
  { path: 'repuestos/:id/new', component: RepuestoNewComponent, canActivate: [AuthGuard]  },
  { path: 'repuestos/:repuestoId', component: RepuestoDetailComponent, canActivate: [AuthGuard]  },
  { path: 'repuestos/:id/edit', component: RepuestoEditComponent, canActivate: [AuthGuard]  },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class RepuestosRoutingModule {}
