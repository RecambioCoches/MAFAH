import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RepuestoService } from './repuesto.service';
import { HttpClientModule } from '@angular/common/http';

@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    HttpClientModule,
  ],
  providers: [RepuestoService],
})
export class CoreModule {}