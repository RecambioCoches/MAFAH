import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { RepuestosRoutingModule } from './repuestos-routing.module';
import { RepuestoItemComponent } from './repuesto-item/repuesto-item.component';
import { SharedModule } from '../shared/shared.module';
import { RepuestoNewComponent } from './repuesto-new/repuesto-new.component';
import { RepuestoEditComponent } from './repuesto-edit/repuesto-edit.component';
import { RepuestoDetailComponent } from './repuesto-detail/repuesto-detail.component';

@NgModule({
  declarations: [
    RepuestoNewComponent,
    RepuestoItemComponent,
    RepuestoEditComponent,
    RepuestoDetailComponent,
  ],
  imports: [CommonModule, RepuestosRoutingModule, SharedModule],
  exports: [RepuestoItemComponent],
})
export class RepuestosModule {}
