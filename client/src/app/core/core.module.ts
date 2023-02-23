import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RepuestoService } from './repuesto.service';
import { HttpClientModule } from '@angular/common/http';
import { AuthService } from './auth.service';
import { AuthGuard } from './auth.guard';

@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    HttpClientModule,
  ],
  providers: [RepuestoService, AuthService, AuthGuard],
})
export class CoreModule {}